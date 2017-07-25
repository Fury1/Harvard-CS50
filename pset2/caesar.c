#include <stdio.h>
#include <cs50.h>
#include <ctype.h>
#include <string.h>

int main(int argc, string argv[])
{

// Check to see if the user inputed 1 argument.
    if (argc != 2)
    {
        printf("ERROR! Please provide a command line argument integer!\n");
        printf("Please re-run and try again!\n");

        return 1;
    }

 // Set argv[1] as a int and make sure its a positive value.
    int rot = atoi(argv[1]);

    if (rot < 1)
    {
        printf("ERROR! Please provide a positive integer!\n");
        printf("Please re-run and try again!\n");

        return 1;
    }

// Get a string from the user to be encrypted.
    string t = GetString();

    /* Loop through the string and apply the cipher key based
    on the string's character case and skip non alphabetical characters. */

    for (int i = 0, l = strlen(t);i < l;i++)
    {
        if (isupper(t[i]))
        {
            printf("%c",((((t[i] - 'A') + rot) % 26) + 'A'));
        }
    else if (islower(t[i]))
        {
            printf("%c",((((t[i] - 'a') + rot) % 26) + 'a'));
        }
    else
        {
            printf("%c",t[i]);
        }
    }

// Go to the next line when done.
    printf("\n");

    return 0;
}
