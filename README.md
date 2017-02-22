# jevcontimage
Insert images from event descriptions into Joomla jevents modules

This plugin is a heavily simplified version of the Jevents Standard Images and Files (jevfiles). It takes the first content image of an event (created in the Jevents component for Joomla), and inserts it in a Jevents Latest Events Module. 

## Usage
This is a Jevents plugin. It works in Jevents displays. It replaces the string JEV_CONTIMAGE in the display’s layout with the 1st content image found in the event's description. The images must be referenced as \<img\> tags in the event’s HTML description (what you usually get if you insert them with a text editor like TinyMCE or JCE). I use it with Jevents Latest Events module.
*Tested with Jevents 3.4.23*

## Background
[Jevents](https://www.jevents.net/) is a Joomla addon to manage calendars of events. It comes with a module used to display selected events (forthcoming, latest etc.) on any page of the website. The module can display the title of the event, its description etc. Natively it cannot display however an image inserted in the event’s description.

The Jevents website offers a plugin (available to subscribers only) to manage event images. It is called [Standard Images and Files](https://www.jevents.net/products-new/addons/silver-addons/item/standard-image-file-uploads-2). However, I personnaly found it cumbersome for the website I developed. It has its own interface and logic of managing the files on the server. I prefer to have a unified way to upload pictures for Joomla articles and for events. In my (little) experience, this proved to be less confusing for the unexpert users, and easier to manage for the admins.
