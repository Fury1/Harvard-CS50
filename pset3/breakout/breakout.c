// **abs() was sourced from stackoverflow.com

// breakout.c
//
// Computer Science 50
// Problem Set 3
//

// standard libraries
#define _XOPEN_SOURCE
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>

// Stanford Portable Library
#include <spl/gevents.h>
#include <spl/gobjects.h>
#include <spl/gwindow.h>

// height and width of game's window in pixels
#define HEIGHT 600
#define WIDTH 400

// number of rows of bricks
#define ROWS 5

// number of columns of bricks
#define COLS 10

// define brick size
#define BRICK_HEIGHT 10
#define BRICK_WIDTH 36

// radius of ball in pixels
#define RADIUS 10

// size of paddle
#define PADDLE_HEIGHT 20
#define PADDLE_WIDTH 70

// lives
#define LIVES 3

// prototypes
void initBricks(GWindow window);
char* brickcolors(int i);
GOval initBall(GWindow window);
GRect initPaddle(GWindow window);
GLabel initScoreboard(GWindow window);
void updateScoreboard(GWindow window, GLabel label, int points);
GObject detectCollision(GWindow window, GOval ball);
void removeGWindow(GWindow window, GObject gobj);

int main(void)
{
    // seed pseudorandom number generator
    srand48(time(NULL));

    // instantiate window
    GWindow window = newGWindow(WIDTH, HEIGHT);

    // instantiate bricks
    initBricks(window);

    // instantiate ball, centered in middle of window
    GOval ball = initBall(window);

    // instantiate paddle, centered at bottom of window
    GRect paddle = initPaddle(window);

    // instantiate scoreboard, centered in middle of window, just above ball
    GLabel label = initScoreboard(window);

    // number of bricks initially
    int bricks = COLS * ROWS;

    // number of lives initially
    int lives = LIVES;

    // number of points initially
    int points = 0;

    // set velocity of x and y axis
    double velocity_x = drand48() - .20;
    double velocity_y = -1.0;

    // click for game to start
    waitForClick();

    // keep playing until game over
    while (lives > 0 && points < 50)
    {
        GEvent event = getNextEvent(MOUSE_EVENT);

        if (event != NULL)
        {
            if (getEventType(event) == MOUSE_MOVED)
            {
                double x = getX(event) - PADDLE_WIDTH / 2;
                double y = getY(paddle);
                setLocation(paddle, x, y);
            }
        }

        move(ball, velocity_x, velocity_y);

        if (getX(ball) + getWidth(ball) >= getWidth(window))
        {
            velocity_x = -velocity_x;
        }

        else if (getX(ball) <= 0)
        {
            velocity_x = -velocity_x;
        }

        if (getY(ball) + getHeight(ball) >= getHeight(window))
        {
            velocity_y = -velocity_y;
        }

        else if (getY(ball) <= 0)
        {
            velocity_y = -velocity_y;
        }

        pause(3);

        GObject object = detectCollision(window, ball);

        if (object != NULL)
        {
            if (strcmp(getType(object), "GRect") == 0)
            {
                if (object == paddle)
                {
                    velocity_y = -abs(velocity_y);
                }

                else if (object != paddle)
                {
                    removeGWindow(window, object);
                    points++;
                    updateScoreboard(window, label, points);
                    velocity_y = -velocity_y;
                }
            }
        }

        if (getY(ball) + RADIUS * 2 > getHeight(window) -5)
        {
            lives--;
            waitForClick();
            setLocation(ball, getWidth(window) / 2, getHeight(window) / 2);
        }
    }

    // waits for the user to click to end the game
     waitForClick();

    // game over
    closeGWindow(window);
    return 0;
}

/**
 * Initializes window with a grid of bricks.
 */
void initBricks(GWindow window)
{

    int bricks_start_x = 6;
    int bricks_start_y = 30;

    for (int i = 0; i < ROWS; i++)
    {
        for (int j = 0; j < COLS; j++)
        {
            GRect bricks = newGRect (bricks_start_x, bricks_start_y, BRICK_WIDTH, BRICK_HEIGHT);
            setFilled(bricks, true);
            setColor(bricks, brickcolors(i));
            add(window, bricks);
            bricks_start_x = bricks_start_x + BRICK_WIDTH + 3;
        }

    bricks_start_x = 6;
    bricks_start_y = bricks_start_y + BRICK_HEIGHT + 3;

    }
}

/**
 * Sets colors of bricks in each row
 */

char* brickcolors(int i)
{

    char* color;

    switch (i)
            {
                case 0:
                    color = "red";
                    break;

                case 1:
                    color = "orange";
                    break;

                case 2:
                    color = "blue";
                    break;

                case 3:
                    color = "yellow";
                    break;

                case 4:
                    color = "green";
                    break;
           }
      return color;
}

/**
 * Instantiates ball in center of window.  Returns ball.
 */
GOval initBall(GWindow window)
{
    GOval ball = newGOval (((WIDTH / 2) - RADIUS), ((HEIGHT - HEIGHT / 6) - PADDLE_HEIGHT), RADIUS * 2, RADIUS * 2);
    setFilled(ball, true);
    setColor(ball, "BLACK");
    add(window, ball);
    return ball;
}

/**
 * Instantiates paddle in bottom-middle of window.
 */
GRect initPaddle(GWindow window)
{
    GRect paddle = newGRect (((WIDTH / 2) - PADDLE_WIDTH / 2), (HEIGHT - HEIGHT / 6), PADDLE_WIDTH, PADDLE_HEIGHT);
    setFilled(paddle, false);
    setColor(paddle, "BLACK");
    add(window, paddle);
    return paddle;
}

/**
 * Instantiates, configures, and returns label for scoreboard.
 */
GLabel initScoreboard(GWindow window)
{
    GLabel label = newGLabel("0");
    setFont(label, "Arial");

    double x = (getWidth(window) - getWidth(label)) / 2;
    double y = (getHeight(window) - getHeight(label)) / 2;

    setLocation(label, x, y);
    add(window, label);
    return label;
}

/**
 * Updates scoreboard's label, keeping it centered in window.
 */
void updateScoreboard(GWindow window, GLabel label, int points)
{
    // update label
    char s[12];
    sprintf(s, "%i", points);
    setLabel(label, s);

    // center label in window
    double x = (getWidth(window) - getWidth(label)) / 2;
    double y = (getHeight(window) - getHeight(label)) / 2;
    setLocation(label, x, y);
}

/**
 * Detects whether ball has collided with some object in window
 * by checking the four corners of its bounding box (which are
 * outside the ball's GOval, and so the ball can't collide with
 * itself).  Returns object if so, else NULL.
 */
GObject detectCollision(GWindow window, GOval ball)
{
    // ball's location
    double x = getX(ball);
    double y = getY(ball);

    // for checking for collisions
    GObject object;

    // check for collision at ball's top-left corner
    object = getGObjectAt(window, x, y);
    if (object != NULL)
    {
        return object;
    }

    // check for collision at ball's top-right corner
    object = getGObjectAt(window, x + 2 * RADIUS, y);
    if (object != NULL)
    {
        return object;
    }

    // check for collision at ball's bottom-left corner
    object = getGObjectAt(window, x, y + 2 * RADIUS);
    if (object != NULL)
    {
        return object;
    }

    // check for collision at ball's bottom-right corner
    object = getGObjectAt(window, x + 2 * RADIUS, y + 2 * RADIUS);
    if (object != NULL)
    {
        return object;
    }

    // no collision
    return NULL;
}

