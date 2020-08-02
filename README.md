<img src="resources/images/php_banner.png" width="1200">

# Climbing Tracker Website 

## Description

This is a website designed for the Climbing Wall Industry. Gyms can publish their route offer and their customers can track their progress while climbing on these routes.

## Highlights

* Analytics page: The majority of the climbing tracker applications that exists offer statistics focused only on the efficacy, which has to do on whether or not the routes were ascended, but they don't give you any insight about the efficiency, which is how much waste, effort, or time it took to ascend them. To be able to really see your progress it's necessary to consider not only how many routes you successfully climbed in a given period of time, and what grade of difficulty were they, but also the number of attempts occurred in the process to accomplish them, which are the uncompleted ascents caused by a fall. This website calculates the climber's efficiency on every grade he has tracked by looking at the relation between successful ascents and the unsuccessful ones.

* Dashboard page

## Pages and Implementations

### Climber

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

## Screen Captions

<img src="resources/images/basics.png" width="150"><img src="resources/images/mendeleiev.png" width="150"><img src="resources/images/doft.png" width="150"><img src="resources/images/responsive.png" width="150"><img src="resources/images/menu.png" width="150">

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

## Input & Output
<img src="resources/images/ps_inout_01.png" width="1000">
<img src="resources/images/ps_inout_02.png" width="1000">
<img src="resources/images/ps_inout_03.png" width="1000">
<img src="resources/images/ps_inout_04.png" width="1000">
<img src="resources/images/ps_inout_05.png" width="1000">
<img src="resources/images/ps_inout_06.png" width="1000">
<img src="resources/images/ps_inout_07.png" width="1000">
<img src="resources/images/ps_inout_08.png" width="1000">
<img src="resources/images/ps_inout_09.png" width="1000">
<img src="resources/images/ps_inout_10.png" width="1000">
<img src="resources/images/ps_inout_11.png" width="1000">
<img src="resources/images/ps_inout_12.png" width="1000">
<img src="resources/images/ps_inout_13.png" width="1000">
<img src="resources/images/ps_inout_14.png" width="1000">
<img src="resources/images/ps_inout_15.png" width="1000">

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


