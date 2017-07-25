/**
 * Sourced header info resizing formula examples from code.google.
 *
 * resize.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Copies a BMP piece by piece and scales it, just because.
 */

#include <stdio.h>
#include <stdlib.h>

#include "bmp.h"

int main(int argc, char* argv[])
{
    // ensure proper usage
    if (argc != 4)
    {
        printf("Usage: ./resize n infile outfile\n");
        return 1;
    }

    // remember filenames and scale factor
    int scale = atoi(argv[1]);
    char* infile = argv[2];
    char* outfile = argv[3];

    // check the scale factor
    if (scale > 100 || scale < 1)
    {
        printf("The scale factor must be between 1 and 100.\n");
        return 1;
    }

    // open input file
    FILE* inptr = fopen(infile, "r");
    if (inptr == NULL)
    {
        printf("Could not open %s.\n", infile);
        return 2;
    }

    // open output file
    FILE* outptr = fopen(outfile, "w");
    if (outptr == NULL)
    {
        fclose(inptr);
        fprintf(stderr, "Could not create %s.\n", outfile);
        return 3;
    }

    // read infile's BITMAPFILEHEADER
    BITMAPFILEHEADER bf;
    fread(&bf, sizeof(BITMAPFILEHEADER), 1, inptr);

    // read infile's BITMAPINFOHEADER
    BITMAPINFOHEADER bi;
    fread(&bi, sizeof(BITMAPINFOHEADER), 1, inptr);

    // ensure infile is (likely) a 24-bit uncompressed BMP 4.0
    if (bf.bfType != 0x4d42 || bf.bfOffBits != 54 || bi.biSize != 40 ||
        bi.biBitCount != 24 || bi.biCompression != 0 )
    {
        fclose(outptr);
        fclose(inptr);
        fprintf(stderr, "Unsupported file format.\n");
        return 4;
    }

    // set new file height, width
    bi.biWidth = scale * bi.biWidth;
    bi.biHeight = scale * bi.biHeight;

    // set padding for each line
    int original_padding =  (4 - (bi.biWidth * sizeof(RGBTRIPLE) / scale) % 4) % 4;
    int scaled_padding =  (4 - (bi.biWidth * sizeof(RGBTRIPLE)) % 4) % 4;

    // update header info
    bi.biSizeImage = abs(bi.biHeight) * ((bi.biWidth * sizeof(RGBTRIPLE)) + scaled_padding);
    bf.bfSize = bi.biSizeImage + sizeof(BITMAPFILEHEADER) + sizeof(BITMAPINFOHEADER);

    // write outfile's BITMAPFILEHEADER
    fwrite(&bf, sizeof(BITMAPFILEHEADER), 1, outptr);

    // write outfile's BITMAPINFOHEADER
    fwrite(&bi, sizeof(BITMAPINFOHEADER), 1, outptr);

    // iterate over infile's scanlines
    for (int i = 0, biHeight = abs(bi.biHeight) / scale; i < biHeight; i++)
    {
        // iterate by the scale
        for (int j = 0; j < scale; j++)
        {
            // iterate over pixels in scanline
            for (int k = 0; k < bi.biWidth / scale; k++)
            {
                // temporary storage
                RGBTRIPLE triple;

                // read RGB triple from infile
                fread(&triple, sizeof(RGBTRIPLE), 1, inptr);

                // write RGB triple the scaled number of times
                for (int l = 0; l < scale; l++)
                {
                    fwrite(&triple, sizeof(RGBTRIPLE), 1, outptr);
                }
            }

            // skip over padding, if any
            fseek(inptr, original_padding, SEEK_CUR);

            // then add it back (to demonstrate how)
            for (int m = 0; m < scaled_padding; m++)
            {
                fputc(0x00, outptr);
            }

            // return the indicator back to repeat line
            fseek(inptr, - (bi.biWidth * 3 / scale + original_padding), SEEK_CUR);
        }

        // return for the next line after scaled line is complete
        fseek(inptr, bi.biWidth * 3 / scale + original_padding, SEEK_CUR);
    }

    // close infile
    fclose(inptr);

    // close outfile
    fclose(outptr);

    // that's all folks
    return 0;

}
