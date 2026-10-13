<?php
    // Initialize variables
    $direction = 0; // 0: direction unknown, 1: up, -1: down
    $changes = 0; // Counter for direction changes
    $new_direction = $direction; // New direction
    print("Enter the floor numbers where the elevator stopped.\r\n"); 
    print("0 - end of input.\r\n"); 
    // Read the first floor
    $prev = intval(fgets(STDIN)); 
    $b_done = ($prev == 0); // Flag variable for loop exit condition
    while (!$b_done)
    {
        $current = intval(fgets(STDIN)); // Enter the remaining floors
        $b_done = ($current == 0); // Exit loop if 0 is entered
        // If floors are the same, direction doesn't change;
        // simply skip
        if (!$b_done && $current != $prev)
        {
            // Determine the new current direction
            // between prev and current
            $new_direction = 1; 
            if ($current > $prev)
            {
                $new_direction = -1; 
            }
        }
        // If the direction was previously known (not 0)
        // and it does not match the new direction, a change has occurred
        if (!$b_done && $direction != 0 && $new_direction != $direction)
        {
            $changes += 1; 
        }
        // Update history for the next step
        $direction = $new_direction; 
        $prev = $current; 
    }
    print("Number of elevator direction changes: " . $changes);
?>