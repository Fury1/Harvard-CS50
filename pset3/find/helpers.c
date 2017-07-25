/**
 * helpers.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Helper functions for Problem Set 3.
 */

#include <cs50.h>
#include <stdio.h>
#include "helpers.h"

/**
 * Returns true if value is in array of n values, else false.
 */
bool search(int value, int values[], int n)
{
// Binary search
    int first = 0;
    int last = n - 1;

    while (first <= last)
    {

        int middle = ((first + last) / 2);

        if (values[middle] == value)
        {
            return true;
        }
        else if (values[middle] > value)
        {
            last = middle - 1;
        }
        else if (values[middle] < value)
        {
            first = middle + 1;
        }
    }
    return false;
 }

/**
 * Bubble sorts array of n values.
 */
void sort(int values[], int n)
{
    for (int i = 0; i < n; i++)
    {
        for (int j = 0; j < n - 1; j++)
        {
            if (values[j] > values[j + 1])
            {
                int t = values[j + 1];
                values[j + 1] = values[j];
                values[j] = t;
            }
        }
    }
    return;
}

