/**
 * recover.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Recovers JPEGs from a forensic image.
 */

#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>

int main(void)
{
    // open card.raw
    FILE* file = fopen("card.raw", "r");
    
    // sanity check for file
    if (file == NULL)
    {
        fclose(file);
        printf("There is no file to open.\n");
        return 1;
    }
    
    // set up a block of memory for fread
    unsigned char buffer[512];
    
    // set counter for jpegs to 0
    int jpeg_count = 0;
    
    // set file pointer
    FILE* img;
    
    // start a loop to check contents of file  
    while (fread(&buffer, 512, 1, file) != 0)    
    {
        
        // compare each byte for start of jpeg
        if (buffer[0] == 0xff && buffer[1] == 0xd8 && buffer[2] == 0xff && (buffer[3] == 0xe0 || buffer[3] == 0xe1))
        {   
            char file_image[8];
            sprintf(file_image, "%03d.jpg", jpeg_count);
            img = fopen(file_image, "w");
            
            // if the start of a jpeg is detected write to the img file
            while(true)
            {
                fwrite(&buffer, sizeof(buffer), 1, img);
                fread(&buffer, 512, 1, file);         
               
                // if another file is detected, close out and start a new file
                if (buffer[0] == 0xff && buffer[1] == 0xd8 && buffer[2] == 0xff && (buffer[3] == 0xe0 || buffer[3] == 0xe1))
                {
                    fclose(img);
                    jpeg_count++;
                    sprintf(file_image, "%03d.jpg", jpeg_count);
                    img = fopen(file_image, "w");
                }
                
                // stop loop at end of file
                if (feof(file))
                {
                    break;
                }
            }            
         }  
    }
    
    return 0;
}
