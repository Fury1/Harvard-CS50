#include <stdio.h>
#include <cs50.h>
#include <ctype.h>
#include <string.h>

int main(void)
{

// Prompt user for their name.
    string n = GetString();

// Print the first character and make it upper case.
    {
        printf("%c",toupper(n[0]));
    }

    /* Loop through the string's characters,
    if a ' ' is dectected print the next character
    and make it upper case. Continue through the whole string. */

        for (int m = 0, l = strlen(n); m <= l; m++)
        {
            if (n[m] == ' ')
            {
                printf("%c",toupper(n[m + 1]));
            }
    }

// Go to the next line when done.
        printf("\n");

        return 0;
}
