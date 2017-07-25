/****************************************************************************
 * dictionary.c
 *
 * Computer Science 50
 * Problem Set 5
 *
 * Implements a dictionary's functionality.
 ***************************************************************************/

#include <stdbool.h>
#include <stdio.h>
#include <stdlib.h>
#include "dictionary.h"
#include <ctype.h>
#include <string.h>

    // count the words loaded in
    int word_count = 0;

    // set up an array for the hash table
    node* hash_table[SIZE];

/**
 * Returns true if word is in dictionary else false.
 */
bool check(const char* word)
{
    // convert the const char word to lower case using a temporary storage container
    char temp_word[LENGTH + 1];

    // copy the word into the temp container
    strcpy(temp_word, word);

    // convert to lower case
    for(int i = 0, l = strlen(word); i < l; i++)
    {
        temp_word[i] = tolower(temp_word[i]);
    }

    // find out where in the array the word was stored
    int index = hash(temp_word);

    // make a crawler to compare the words in the linked list and set its location in the array
    node* crawl = hash_table[index];

    /* check to see if the indexed value is populated before checking
       if the word isnt found in the linked list consider it misspelled by returning false */
    if (crawl == NULL)
    {
        return false;
    }

    // if the indexed value is populated check the linked list
    while (crawl != NULL)
    {
        if (strcmp(temp_word, crawl -> word) == 0)
        {
            return true;
        }
        // if the temporary word doesnt match the crawlers pointer to the word, move on to the next node
        crawl = crawl -> next;
    }

    // if the word isnt found in the linked list consider it misspelled by returning false
    return false;
}


// Loads dictionary into memory.  Returns true if successful else false.
bool load(const char* dictionary)
{
   // open infile and set a pointer to it
   FILE* infile = fopen(dictionary, "r");

    // check for infile, return false if nothing
    if (infile == NULL)
    {
        fclose(infile);
        printf("Cannot open %s.\n", dictionary);
        return false;
    }

    while (true)
    {
        // allocate memory for a node
        node* new_node = malloc(sizeof(node));

        // scan in the word and put it in the node
        if (fscanf(infile, "%s",new_node -> word) == EOF)
        {
            free(new_node);
            break;
        }
        // if the scanned word is not the EOF add a word to the count
        word_count++;

        // hash the scanned in value to assign it a indexed number relative to the table size
        int indexed_value = hash(new_node -> word);

        /* check to see if the indexed slot is free, if it is insert the struct into the hash table
           and set a null pointer to show an end point */
        if (hash_table[indexed_value] == NULL)
        {
            hash_table[indexed_value] = new_node;
            new_node -> next = NULL;
        }

        /* check to see if the indexed slot is being used, if it is adjust the linked list and keep all pointers
           to not break the chain */
        else if (hash_table[indexed_value] != NULL)
        {
            new_node -> next = hash_table[indexed_value];
            hash_table[indexed_value] = new_node;
        }
    }

    // close the file when complete
    fclose(infile);

    // return true if successful
    return true;
}

/**
 * Returns number of words in dictionary if loaded else 0 if not yet loaded.
 */
unsigned int size(void)
{
    if (word_count <= 0)
    {
        printf("The dictionary was not loaded, error!\n");
        return 0;
    }

    unsigned int size = word_count;

    return size;
}

/**
 * Unloads dictionary from memory.  Returns true if successful else false.
 */
bool unload(void)
{
    // keep track of index
    int index = 0;

    // loop through the entire array size
    while (index < SIZE)
    {
            // set a crawler to the hash table index value
            node* crawl = hash_table[index];

            // if crawls value is being populated free it and move to the next link in the list to do the same
            while (crawl != NULL)
            {
                node* temp = crawl;
                crawl = crawl -> next;
                free(temp);
            }

            // when done move to the next value in the hash table
            index++;
     }

    // return true when the whole list has been freed
    if (index == SIZE)
    {
        return true;
    }

    printf("Could not unload, error!\n");
    return false;
}
/**
  * Function to hash data and give it a value for the array index, the function itself was sourced from
https://www.reddit.com/r/cs50/comments/1x6vc8/pset6_trie_vs_hashtable/
*
**/
int hash(char* needs_hashing)
{
    unsigned int hash = 0;

    for (int i = 0, n = strlen(needs_hashing); i < n; i++)
    {
        hash = (hash << 2) ^ needs_hashing[i];
    }
    return hash % SIZE;
}
