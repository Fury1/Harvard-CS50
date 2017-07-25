/***************************************************************************
 * generate.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Generates pseudorandom numbers in [0,LIMIT), one per line.
 *
 * Usage: generate n [s]
 *
 * where n is number of pseudorandom numbers to print
 * and s is an optional seed
 ***************************************************************************/

// standard libraries
#define _XOPEN_SOURCE
#include <cs50.h>
#include <stdio.h>
#include <stdlib.h>
#include <time.h>

// constant
#define LIMIT 65536

int main(int argc, string argv[])
{
    // Checks to see if the user has provided an argc of 2 or 3
    //If not, a message is displayed to the user, returning error
    if (argc != 2 && argc != 3)
    {
        printf("Usage: generate n [s]\n");
        return 1;
    }

    // Converts argv[1] from a string to an int and sets it to variable n
    int n = atoi(argv[1]);

    // Checks to see if the user has provided the optional argc 3
    // Uses srand48 with the  user inputed string converted to a long int
    // Otherwise uses srand48 and inputs it with the current time
    // Srand48 is used to intialize drand48 in both instances
    if (argc == 3)
    {
        srand48((long int) atoi(argv[2]));
    }
    else
    {
        srand48((long int) time(NULL));
    }

    // Loop through and print the random numbers specified by the user
    // using drand48 with the int from above
    for (int i = 0; i < n; i++)
    {
        printf("%i\n", (int) (drand48() * LIMIT));
    }

    // success
    return 0;
}
