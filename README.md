# Project 3 Developer's Best Friend

## Live URL
<http://p3.pyxisweb.me>

## Description
The Developer's Best Friend provides three tools that support the software development process:

* Lorem Ipsum generator to create filler text for websites and other purposes. Text is generated based on a specified theme (traditional Latin, Monty Python, movie quotes or song lyrics), form (paragraphs, unordered lists, ordered lists) and format (straight text or HTML).
* Random user generator to create mass sample data based on selected data fields, number of records and data script format (JSON, PHP array, CSV, XML, YAML, MySQL).
* XKCD password generator to create easily memorable, highly secure passwords (same specifications as in project 2).

## Project 3 Screencast
<http://screencast.com/t/KlNbdEfdf9>

## Details for Teaching Team
In general, I have a separate controller, view and PHP class for each of the three tools in my DBF application, with the controller and PHP class residing in a separate folder under app/Http/Controllers and the view in a separate folder under resources/views/, i.e.

Lorem Ipsum generator - app/Http/Controllers/lorem/LoremController.php, app/Http/Controllers/lorem/Lorem.php (class), resources/views/lorem/index.blade.php

Random user generator - app/Http/Controllers/rug/RUGController.php, app/Http/Controllers/rug/RUG.php, resources/views/rug/index.blade.php

XKCD password generator - app/Http/Controllers/xkcd/XKCDController.php, app/Http/Controllers/xkcd/XKCD.php resources/views/rug/index.blade.php, as well as supporting classes Words.php and PaulNoll.php in app/Http/Controllers/xkcd/

### Views
Tool views are based on the master view in resources/views/layouts.master.blade.php, though if I had more time I would have also created an additional blade layout based on master.blade.php on which to base the specific tool views, as each tool has generally the same layout but looks different from the home page.

The DBF home page is in resources/views/index.blade.php and extends master.blade.php

In addition to @yield/@section placeholders for title, content and body I also created @yield/@section placeholders for banner text headers and navigation links.

### Classes
Classes are basically static classes with a public generate function and constant definitions for things such as field minimums/maximums, radio button option values, etc.

### Specific Lorem notes

I used the fzaninotto/faker package to generate the Latin text and wrote my own functions for other theme-related text.

Rendering regular text vs. HTML code turned out to be very easy, I did this in views by having separate {{ }} and {!! !!} sections (this last suppresses tag-to-character (e.g. < to &lt;) conversions).

### Specific RUG notes

The RUG.php class contains a couple of special elements:

* A static array called $FIELD_NAMES which includes the names of data fields (used both in the selection screen and for MySQL output) and MySQL types (e.g. VARCHAR(20)).
* Public static arrays called $available_fields and $selected_fields which persist the fields actually selected (and not selected) by the user (if I had more time, I think I would have just used the $_POST[] elements for this purpose).
* Code for generating the HTML for available/selected fields (I felt it was better to generate this code here instead of within a Javascript function, so I could keep everything in one place).

I used the soapbox/laravel-formatter to convert arrays into JSON, CSV, XML and YAML formats, and wrote my own code to do the conversion into MySQL. Then though I used a different method to create the code in PHP array format, it was also very easy, just var_export.

### FYIs

* When creating controller validation rules, I tried to concatenate fields from my classes (e.g. "min:".Lorem::SENTENCE_MIN), and while this worked in my local system, it failed in production.
* I needed to specify dev-master for the fzaninotto/faker package in composer.json since one field I wanted to use (jobTitle) required the latest version of that package.

## Outside Code
I used the following packages for this project:

fzaninotto/faker - To generate records for the random user generator as well as traditional Latin text for the Lorem Ipsum generator (also see related notes above).

soapbox/laravel-formatter - Used in the random user generator to convert arrays into JSON, CSV, XML and YAML formats (also see related notes above).

Finally, I also relied on the following links (and a lot of Googling) to create my Javascript/JQuery code for the user interface:

<http://johnwbartlett.com/cf_tipsntricks/index.cfm?TopicID=86> Javascript code for moving selected elements from one select box to another, I added functionality to move all elements from one select box to the other.

<http://stackoverflow.com/questions/11918397/jquery-hide-show-input-object> jquery code to hide/suppress HTML elements based on other elements.
