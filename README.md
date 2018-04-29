# Web site for Brown Bros. Air Conditioning & Heating Sales & Service

---

Current status is a collection of static HTML files, with `php` extensions.

~~If the `.htaccess` file is disabled, the links will work, otherwise they will not. This is a temporary condition while the static HTML is being converted to dynamic PHP.~~

The links in the generated HTML now work and the `.htaccess` file is enabled with the `mod_rewrite` configured to allow page names to be used as www.BrownBros.net/`page_name`.

Intentions are to use PHP to serve the pages with common content merged with the page specific content. Some pages will become more _dynamic_ in nature, and the navication menu will be modified for each page as needed.

The site will grow a minimal amount, although the content will increase, and be refined over time.

---

## TODO

- Develop a 'Home" page rather than using the current flyer
- ~~Convert to PHP operations~~
- Customize `<META>` tags for each file (__Configured, data still is TBD.__)
- Create a method for site owner to add content to informational pages
- Dynamically generate informational pages from owner-created content
- ~~Implement the planned message sending from the Contact Us page.~~
- An archive of past flyers (?possibly)
- Add a testimonials page (?possibly)
- Add a guestbook (?possibly)

---

## Licensing

At this time this repository is not licensed for use or distribution by anyone, for any purpose.

Future plans are to select an OpenSource license to release this under. That, however, is not yet set in any timeframes.

Effective site content (text and images) copyright 2018, Michael Brown, Brown Bros Air Conditioning and Heating Sales and Service.

Unless noted elsewhere, all other content - HTML, CSS, PHP, etc. - is copyright 2018, Ronald Lamoreaux, DBA Chindraba

Font files are copyright by their respective owners, as noted in the `CSS` files that load them. The licenses for which are available where noted, or in the `licenses` directory of this repository.

The TinyMCE Editor component is copyright [Ephox Corporation](https://www.tinymce.com/) and Licensed under the [GNU Lessor General Public License, version 2.1.](https://www.gnu.org/licenses/old-licenses/lgpl-2.1.en.html)
