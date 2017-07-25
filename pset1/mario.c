#include <stdio.h>
#include <cs50.h>

int main(void)
{
// Prompt the user for the height of the pyramid.
    printf("Lets make a pyramid, please select a height from 1-23...\n");
    int height = GetInt();

    /* Check to see if the pyramid height is within 1 and 23,
    re-prompt the user until the number is within spec. */

    if (height < 0 || height > 23 )
    {
        do
        {
            printf("The number HAS TO BE BETWEEN 1 AND 23!!! TRY AGAIN!!!\n");
            height = GetInt();
            }
            while (height < 0 || height > 23 );
            }

// Start of loop for rows based on height.
    for (int row = height; row > 0; row--)
    {
// Print the spaces.
        for (int space = row; space >= 2; space--)
        {
            printf(" ");
        }
// Print the "#".
        for (int hash = row - 2; hash < height; hash++)
        {
            printf("#");
        }
// Go to the the next line once complete with row.
        printf("\n");
        }
    return 0;
}

