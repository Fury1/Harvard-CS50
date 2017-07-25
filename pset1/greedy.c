#include <stdio.h>
#include <cs50.h>

int main(void)
{
// Declaring the variables.
    int quarter;
    int dime ;
    int nickel;
    int penny;

    /* Prompt the user for a change ammount. Set variable
    using float instead of int to retain decimal values. */


    printf("How much change do I owe you?\n");
    float change = GetFloat();


    /* Check to see if the change ammount is positive,
    if not, re-prompt the user until the value is positive. */

    while (change < 0.00)
    {
        printf("That wasn't a positive value! TRY AGAIN!\n");
        change = GetFloat();
    }

    /* Start a series of loops to count coins
    from biggest to smallest. Hard coded coin values
    to account for rounding errors in C. */

    for (quarter = 0;change >= 0.25; quarter++)
    {
        change = change - 0.25;
    }
    for (dime = 0;change >= 0.099 && change < 0.25; dime++)
    {
        change = change - 0.10;
    }
    for (nickel = 0;change >= 0.049 && change < 0.98;nickel++)
    {
        change = change - 0.05;
    }
    for (penny = 0;change > 0.001 && change <= 0.048;penny++)
    {
        change = change - 0.01;
    }
// Add up the coins.
    int coins = quarter + dime + nickel + penny;

// Print out the number of coins.
    printf("%d\n",coins);

    return 0;
}
