# Panic_Bear

## A climbing tracker website 

<img src="resources/images/panic_bear_banner_1.jpg" width="1000">

In sport climbing, tracking the **efficacy** has to do on whether or not a route was ascended from the ground to the top, with no falls and no additional help. But in order to really evaluate the climber's progress it's necessary to consider the **efficiency** too, which is how many attempts, or unsuccessful ascents, occurred in the process.

This website calculates the climber's efficiency on every grade he has tracked by looking at the relation between successful ascents and the unsuccessful ones.

After creating an account, the user can register his climbs, access to his climbing record and see some statistics in order to understand his performance in the different difficulty levels he has tried on the walls. 

Gym managers can also create an account and upload the routes they have in their gyms (this allow the users to add these same routes to their record after). Gym managers can also access to the history of their routes and see some statistics that could help to better distribute and plan their routesetting.

## Implementation

Relational Database explanation


### Recording the climbs

### Generating the statistics

### The tools for routesetting

* Gyms -
* Add -
* History -
* Analytics -

### Gym Admin

* Gym Signup -
* New -
* Routes -
* Dashboard -

### User 

* Home - Main page with access to  
* Signup -
* Login - username and password are required to validate them and the 
* Logout -

## Logbook

I recommend to take a look to this videos from CS50:

* [Computational Complexity][computational complexity]
* [Selection Sort][selection sort]
* [Bubble Sort][bubble sort]
* [Insertion Sort][insertion sort]
* [Merge Sort][merge sort]
* [Algorithms Summary][algorithms summary]
* [Stacks][stacks]
* [Tries][tries]

## Installation
At the root of this repository:

`cd push_swap` | Go to the compilation directory.

`make` | Compiles and creates two programs: `push_swap` and `checker`.

## Usage
`./push_swap [integers array]` | Prints the solution.

`./checker [integers array]` | Reads the solution from the standard input, and prints "OK" or "KO".

The `integers array` can be:
- Multiple ints as arguments (3 2 1 0).
- One single char string argument ("3 2 1 0").
- A combination of both (3 "2 1" 0).

## Optional flags
`./push_swap -w [integers array]` | Prints the solution in a file.

`./checker -r [integers array]` | Reads the solution from a file.

`./checker -v [integers array]` | Reads the solution from the standard input and display, at every time, a visual representation of the stacks current status.

## Final Thoughts
This project was a good opportunity to put in practice different data structures as: stacks, hash tables and tries. Additionally, I really enjoyed taking the moment to thing outside the box and looking for optimization and creative solutions.

## Credits
[*Luis Sanchez*][linkedin] 2019, [42 Silicon Valley][42].

[computational complexity]: https://www.youtube.com/watch?v=YoZPTyGL2IQ
[selection sort]: https://www.youtube.com/watch?v=3hH8kTHFw2A
[bubble sort]: https://www.youtube.com/watch?v=RT-hUXUWQ2I
[insertion sort]: https://www.youtube.com/watch?v=O0VbBkUvriI
[merge sort]: https://www.youtube.com/watch?v=Ns7tGNbtvV4
[algorithms summary]: https://www.youtube.com/watch?v=ktWL3nN38ZA
[stacks]: https://www.youtube.com/watch?v=hVsNqhEthOk
[tries]: https://www.youtube.com/watch?v=MC-iQHFdEDI

[linkedin]: https://www.linkedin.com/in/luis-sanchez-13bb3b189/
[42]: http://42.us.org "42 USA"


