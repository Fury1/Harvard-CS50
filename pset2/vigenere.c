#include <stdio.h>
#include <cs50.h>
#include <ctype.h>
#include <string.h>

int main(int argc, string argv[])
{

// Check to see if the user inputed 1 argument.
    if (argc != 2)
    {
        printf("Please provide a alphabetical ONLY key!\n");
        printf("Please re-run and try again!\n");

        return 1;
    }

// Loop through argv[1] and make sure it is alphabetical only.
    for (int i = 0, l = strlen(argv[1]); i < l; i++)
    {
        if (!isalpha(argv[1][i]))
        {
            printf("ERROR! Please provide a alphabetical only key!\n");
            printf("Please re-run and try again!\n");

            return 1;
        }
    }

// Set argv[1] as a variable and get a string to be encrypted from the user.
    string key = argv[1];
    string t = GetString();

// Set the string length of the key & text from the user to an int.
    int s = strlen(t);
    int l = strlen(key);

    /* Start looping through the user text and applying the key based
    capitalization of text, while disregarding key capitalation and
    holding key counter for non alphabetical characters
    of text */

    for (int j = 0; j < s;)
    {
        for (int i = 0; i < s;)
        {
            if (isupper(key[i]))
            {
                key[i] = key[i] - 65;
            }
        else if (islower(key[i]))
            {
                key[i] = key[i] - 97;
            }

// Break the loop once text string is processed to prevent seg fault.
            if ( j == s)
            {
                break;
            }

    else

    if  (isupper(t[j]))
            {
                printf("%c",((((t[j] - 'A') + key[i % l]) % 26) + 'A'));
                j++,i++;
            }

        else if (islower(t[j]))
            {
                printf("%c",((((t[j] - 'a') + key[i % l]) % 26) + 'a'));
                j++,i++;
            }

        else
            {
                printf("%c",t[j]);
                j++;
            }
     }
     }

// Go to the next line when complete.
    {
        printf("\n");
    }
        return 0;
}
