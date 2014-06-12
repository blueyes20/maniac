Day-Calendar (Feb-2014)
==========
### By: Michael Chen 

[1]: http://backbonejs.org/
[2]: https://github.com/jeromegn/Backbone.localStorage
[3]: http://facebook.github.io/react/
[4]: https://github.com/usepropeller/react.backbone
[5]: http://requirejs.org/

Description
----------
This is a day event planner single-page application that allows users to add, edit, and delete events.  Events are rendered on a calendar and will re-size and re-position themselves based on surrounding events to prevent visual overlap.  Events and settings are stored in HTML5 localStorage. 

Utilizes [Backbone.js][1] Models/Collections and Facebook/Instagram's
[React.js][3] for Views.  Views subscribe to events through [React's 
Backbone adapter][4] and events and settings stored in localStorage
with a [Backbone localStorage adapter][2].  JavaScript code is 
organized using [Require.js (AMD)][5] 

Functionality
----------
1. **Add Events** - Add events with the "+" button in top-right
2. **View Event** - Expand event details by clicking on a rendered event
3. **Edit Events** - Edit by clicking the pencil button in the top-right of a rendered event
4. **Remove Events** - Remove by clicking the 'x' button in the top-right of a rendered event
5. **Change Calendar Range** - Access settings by clicking cog button in top-right
6. **Change Day View** - Hover over current day and click on left and right arrows to move forward and back a day respectively.

Other
-----------
### Languages:
- HTML5
- CSS3 (Sass/Compass)
- JavaScript

### Libraries/Plugins:
- Backbone.js (with localStorage adapter plugin)
- React.js (with Backbone plugin)
- Require.js
- Zepto.js
- Lo-Dash.js



