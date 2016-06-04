Bootstrap 3 Shortcodes
======================

## Shortcode Reference

### CSS
* [Grid](#grid)
* [Responsive utilities](#responsive-utilities)

### Components
* [Alerts](#alerts)

# Usage

### CSS

### Grid
	  [row]
	    [column md="6"]
	      ...
	    [/column]
	    [column md="6"]
	      ...
	    [/column]
	  [/row]
    
The container component is also supported in case your theme doesn't incude a container.

	[container]
	  [row]
	    [column md="6"]
	      ...
	    [/column]
	    [column md="6"]
	      ...
	    [/column]
	  [/row]
	[/container]

#### [container] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
fluid | Is the container fluid? (see Bootstrap documentation for details) | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none

#### [row] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none

#### [column] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xs | Size of column on extra small screens (less than 768px) | optional | 1-12 | false
sm | Size of column on small screens (greater than 768px) | optional | 1-12 | false
md | Size of column on medium screens (greater than 992px) | optional | 1-12 | false
lg | Size of column on large screens (greater than 1200px) | optional | 1-12 | false
offset_xs | Offset on extra small screens | optional | 1-12 | false
offset_sm | Offset on small screens | optional | 1-12 | false
offset_md | Offset on column on medium screens | optional | 1-12 | false
offset_lg | Offset on column on large screens | optional | 1-12 | false
pull_xs | Pull on extra small screens | optional | 1-12 | false
pull_sm | Pull on small screens | optional | 1-12 | false
pull_md | Pull on column on medium screens | optional | 1-12 | false
pull_lg | Pull on column on large screens | optional | 1-12 | false
push_xs | Push on extra small screens | optional | 1-12 | false
push_sm | Push on small screens | optional | 1-12 | false
push_md | Push on column on medium screens | optional | 1-12 | false
push_lg | Push on column on large screens | optional | 1-12 | false
xclass | Any extra classes you want to add | optional | any text | none

[Bootstrap grid documentation](http://getbootstrap.com/css/#grid).

* * *

### Responsive Utilities
	[responsive block="lg md" hidden="sn xs"] ... [/responsive]

#### [reponsive] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
visible | Sizes at which this element is visible (separated by spaces) **NOTE: as of Bootstrap 3.2 "visible" is deprecated in favor of "block", "inline", and "inline-block" (see below)** | optional | xs, sm, md, lg  | false
hidden | Sizes at which this element is hidden (separated by spaces) | optional | xs, sm, md, lg  | false
block | Sizes at which this element is visible and displayed as a "block" element (separated by spaces) | optional | xs, sm, md, lg  | false
inline | Sizes at which this element is visible and displayed as an "inline" element (separated by spaces) | optional | xs, sm, md, lg  | false
inline_block | Sizes at which this element is visible and displayed as an "inline-block" element (separated by spaces) | optional | xs, sm, md, lg  | false
xclass | Any extra classes you want to add | optional | any text | none

[Bootstrap responsive utilities documentation](http://getbootstrap.com/css/#responsive-utilities)

* * *

### Alerts
	[alert type="success"] ... [/alert]

#### [alert] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of the alert | required | success, info, warning, danger | success
dismissable | If the alert should be dismissable | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none

[Bootstrap alert documentation](http://getbootstrap.com/components/#alerts)

* * *
