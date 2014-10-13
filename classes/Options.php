<?php
/**
 * DynamicPageList
 * DPL Options Class
 *
 * @author		IlyaHaykinson, Unendlich, Dangerville, Algorithmix, Theaitetos, Alexia E. Smith
 * @license		GPL
 * @package		DynamicPageList
 *
 **/
namespace DPL;

class Options {
    /**
     * Map parameters to possible values.
     * A 'default' key indicates the default value for the parameter.
     * A 'pattern' key indicates a pattern for regular expressions (that the value must match).
     * For some options (e.g. 'namespace'), possible values are not yet defined but will be if necessary (for debugging) 
     */	
    public static $options = array(
        'addauthor'            => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'),
        'addcategories'        => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'),
        'addcontribution'      => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'),
        'addeditdate'          => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'),
        'addexternallink'      => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'),
        'addfirstcategorydate' => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'),
        'addlasteditor'        => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'),
        'addpagecounter'       => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'),
        'addpagesize'          => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'),
        'addpagetoucheddate'   => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'),
        'adduser'              => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'),
		
		// default of allowcachedresults depends on behaveasIntersetion and on LocalSettings ...
        'allowcachedresults'   => array( 'true', 'false', 'no', 'yes', 'yes+warn', '0', '1', 'off', 'on'),
        /**
         * search for a page with the same title in another namespace (this is normally the article to a talk page)
         */
        'articlecategory'    => null,

        /**
         * category= Cat11 | Cat12 | ...
         * category= Cat21 | Cat22 | ...
         * ...
         * [Special value] catX='' (empty string without quotes) means pseudo-categoy of Uncategorized pages
         * Means pages have to be in category (Cat11 OR (inclusive) Cat2 OR...) AND (Cat21 OR Cat22 OR...) AND...
         * If '+' prefixes the list of categories (e.g. category=+ Cat1 | Cat 2 ...), only these categories can be used as headings in the DPL. See  'headingmode' param.
         * If '-' prefixes the list of categories (e.g. category=- Cat1 | Cat 2 ...), these categories will not appear as headings in the DPL. See  'headingmode' param.
         * Magic words allowed.
         * @todo define 'category' options (retrieve list of categories from 'categorylinks' table?)
         */
        'category'             => null,
        'categorymatch'        => null,
        'categoryregexp'       => null,
        /**
         * Min and Max of categories allowed for an article
         */
        'categoriesminmax'     => array('default' => '', 'pattern' => '/^\d*,?\d*$/'),
        /**
         * hiddencategories
         */
        'hiddencategories'     => array('default' => 'include', 'exclude', 'only'),
		/**
		 * perform the command and do not query the database
		 */
        'execandexit'		   => array('default' => ''),
		
        /**
         * number of results which shall be skipped before display starts
         * default is 0
         */
        'offset'               => array('default' => '0', 'pattern' => '/^\d*$/'),
        /**
         * Max of results to display, selection is based on random.
         */
        'count'                => array('default' => '500', 'pattern' => '/^\d*$/'),
        /**
         * Max number of results to display, selection is based on random.
         */
        'randomcount'          => array('default' => '', 'pattern' => '/^\d*$/'),
        /**
         * shall the result set be distinct (=default) or not?
         */
        'distinct'             => array('default' => 'true', 'strict', 'false', 'no', 'yes', '0', '1', 'off', 'on'),

        'dplcache'		       => array('default' => ''),
        'dplcacheperiod'       => array('default' => '86400', 'pattern' => '/^\d+$/'), // 86400 = # seconds for one day

        /**
         * number of columns for output, default is 1
         */
        'columns'              => array('default' => '', 'pattern' => '/^\d+$/'),

        /**
         * debug=...
         * - 0: displays no debug message;
         * - 1: displays fatal errors only; 
         * - 2: fatal errors + warnings only;
         * - 3: every debug message.
         * - 4: The SQL statement as an echo before execution.
         * - 5: <nowiki> tags around the ouput
		 * - 6: don't execute SQL statement, only show it
         */
        'debug'                => array( 'default' => '2', '0', '1', '2', '3', '4', '5', '6'),

        /**
         * eliminate=.. avoid creating unnecessary backreferences which point to to DPL results.
         *				it is expensive (in terms of performance) but more precise than "reset"
         * categories: eliminate all category links which result from a DPL call (by transcluded contents)
         * templates:  the same with templates
         * images:	   the same with images
         * links:  	   the same with internal and external links
         * all		   all of the above
         */
        'eliminate'                => array( 'default' => '', 'categories', 'templates', 'links', 'images', 'all', 'none'),
        /**
         * Mode at the heading level with ordermethod on multiple components, e.g. category heading with ordermethod=category,...: 
         * html headings (H2, H3, H4), definition list, no heading (none), ordered, unordered.
         */

        'format'       		   => null,

        'goal'                 => array('default' => 'pages', 'pages', 'categories'),

        'headingmode'          => array( 'default' => 'none', 'H2', 'H3', 'H4', 'definition', 'none', 'ordered', 'unordered'),
        /**
         * we can display the number of articles within a heading group
         */
        'headingcount'         => array( 'default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'),
        /**
         * Attributes for HTML list items (headings) at the heading level, depending on 'headingmode' (e.g. 'li' for ordered/unordered)
         * Not yet applicable to 'headingmode=none | definition | H2 | H3 | H4'.
         * @todo Make 'hitemattr' param applicable to  'none', 'definition', 'H2', 'H3', 'H4' headingmodes.
         * Example: hitemattr= class="topmenuli" style="color: red;"
         */
        'hitemattr'            => array('default' => ''),
        /**
         * Attributes for the HTML list element at the heading/top level, depending on 'headingmode' (e.g. 'ol' for ordered, 'ul' for unordered, 'dl' for definition)
         * Not yet applicable to 'headingmode=none'.
         * @todo Make 'hlistattr' param applicable to  headingmode=none.
         * Example: hlistattr= class="topmenul" id="dmenu"
         */
        'hlistattr'            => array('default' => ''),
        /**
         * PAGE TRANSCLUSION: includepage=... or include=...
         * To include the whole page, use a wildcard:
         * includepage =*
         * To include sections labeled 'sec1' or 'sec2' or... from the page (see the doc of the LabeledSectionTransclusion extension for more info):
         * includepage = sec1,sec2,..
         * To include from the first occurrence of the heading 'heading1' (resp. 'heading2') until the next heading of the same or lower level. Note that this comparison is case insensitive. (See http://www.mediawiki.org/wiki/Extension:Labeled_Section_Transclusion#Transcluding_visual_headings.) :
         * includepage = #heading1,#heading2,....
         * You can combine:
         * includepage= sec1,#heading1,...
         * To include nothing from the page (no transclusion), leave empty:
         * includepage =
         */

        'includepage'          => array('default' => ''),
        /**
         * make comparisons (linksto, linksfrom ) case insensitive
         */
        'ignorecase'		   => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'),
        'include'          	   => null,
        /**
         * includesubpages    default is TRUE
         */
        'includesubpages'      => array('default' => 'true', 'false', 'no', 'yes', '0', '1', 'off', 'on'),
        /**
         * includematch=..,..    allows to specify regular expressions which must match the included contents
         */
        'includematch'       => array('default' => ''),
        'includematchparsed' => array('default' => ''),
        /** 
         * includenotmatch=..,..    allows to specify regular expressions which must NOT match the included contents
         */
        'includenotmatch'       => array('default' => ''),
        'includenotmatchparsed' => array('default' => ''),
        'includetrim'           => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'),
        /** 
         * Inline text is some wiki text used to separate list items with 'mode=inline'.
         */
        'inlinetext'           => array('default' => '&#160;-&#160;'),
        /**
         * Max # characters of included page to display.
         * Empty value (default) means no limit.
         * If we include setcions the limit will apply to each section.
         */
        'includemaxlength'     => array('default' => '', 'pattern' => '/^\d*$/'),
        /**
         * Attributes for HTML list items, depending on 'mode' ('li' for ordered/unordered, 'span' for others).
         * Not applicable to 'mode=category'.
         * @todo Make 'itemattr' param applicable to 'mode=category'.
         * Example: itemattr= class="submenuli" style="color: red;"
         */
        'itemattr'             => array('default' => ''),
        /**
         * listseparators is an array of four tags (in wiki syntax) which defines the output of DPL
         * if mode = 'userformat' was specified.
         *   '\n' or '¶'  in the input will be interpreted as a newline character.
         *   '%xxx%'      in the input will be replaced by a corresponding value (xxx= PAGE, NR, COUNT etc.)
         * t1 and t4 are the "outer envelope" for the whole result list, 
         * t2,t3 form an inner envelope around the article name of each entry.
         * Examples: listseparators={|,,\n#[[%PAGE%]]
         * Note: use of html tags was abolished from version 2.0; the first example must be written as:
         *         : listseparators={|,\n|-\n|[[%PAGE%]],,\n|}
         */
        'listseparators'       => array('default' => ''),
        /**
         * sequence of four wiki tags (separated by ",") to be used together with mode = 'userformat'
         *              t1 and t4 define an outer frame for the article list 
         *              t2 and t3 build an inner frame for each article name
         *   example:   listattr=<ul>,<li>,</li>,</ul>
         */
        'listattr'             => array('default' => ''),
        /**
         * this parameter restricts the output to articles which can reached via a link from the specified pages.
         * Examples:   linksfrom=my article|your article
         */
        'linksfrom'            => array('default' => ''),
        /**
         * this parameter restricts the output to articles which cannot be reached via a link from the specified pages.
         * Examples:   notlinksfrom=my article|your article
         */
        'notlinksfrom'         => array('default' => ''),
        /**
         * this parameter restricts the output to articles which contain a reference to one of the specified pages.
         * Examples:   linksto=my article|your article   ,  linksto=Template:my template   ,  linksto = {{FULLPAGENAME}}
         */
        'linksto'              => array('default' => ''),
        /**
         * this parameter restricts the output to articles which do not contain a reference to the specified page.
         */
        'notlinksto'           => array('default' => ''),
        /**
         * this parameter restricts the output to articles which contain an external reference that conatins a certain pattern
         * Examples:   linkstoexternal= www.xyz.com|www.xyz2.com
         */
        'linkstoexternal'      => array('default' => ''),
        /**
         * this parameter restricts the output to articles which use one of the specified images.
         * Examples:   imageused=Image:my image|Image:your image
         */
        'imageused'              => array('default' => ''),
         /**
		 * this parameter restricts the output to images which are used (contained) by one of the specified pages.
		 * Examples:   imagecontainer=my article|your article
		 */
		'imagecontainer'	 => array('default' => ''),
        /**
         * this parameter restricts the output to articles which use the specified template.
         * Examples:   uses=Template:my template
         */
        'uses'                 => array('default' => ''),
        /**
         * this parameter restricts the output to articles which do not use the specified template.
         * Examples:   notuses=Template:my template
         */
        'notuses'              => array('default' => ''),
        /**
         * this parameter restricts the output to the template used by the specified page.
         */
        'usedby'               => array('default' => ''),
        /**
         * allows to specify a username who must be the first editor of the pages we select
         */
        'createdby'            => null,
        /**
         * allows to specify a username who must not be the first editor of the pages we select
         */
        'notcreatedby'            => null,
        /**
         * allows to specify a username who must be among the editors of the pages we select
         */
        'modifiedby'           => null,
        /**
         * allows to specify a username who must not be among the editors of the pages we select
         */
        'notmodifiedby'           => null,
        /**
         * allows to specify a username who must be the last editor of the pages we select
         */
        'lastmodifiedby'           => null,
        /**
         * allows to specify a username who must not be the last editor of the pages we select
         */
        'notlastmodifiedby'           => null,
        /**
         * Mode for list of pages (possibly within a heading, see 'headingmode' param).
         * 'none' mode is implemented as a specific submode of 'inline' with <br /> as inline text
         * 'userformat' does not produce any html tags unless 'listseparators' are specified
         */
        'mode'				   => null,  // depends on behaveAs... mode
        /**
         * by default links to articles of type image or category are escaped (i.e. they appear as a link and do not
         * actually assign the category or show the image; this can be changed.
         * 'true' default
         * 'false'  images are shown, categories are assigned to the current document
         */
        'escapelinks'          => array('default' => 'true','false', 'no', 'yes', '0', '1', 'off', 'on'),
        /**
         * by default the oage containingthe query will not be part of the result set.
         * This can be changed via 'skipthispage=no'. This should be used with care as it may lead to
         * problems which are hard to track down, esp. in combination with contents transclusion.
         */
        'skipthispage'         => array('default' => 'true','false', 'no', 'yes', '0', '1', 'off', 'on'),
        /**
         * namespace= Ns1 | Ns2 | ...
         * [Special value] NsX='' (empty string without quotes) means Main namespace
         * Means pages have to be in namespace Ns1 OR Ns2 OR...
         * Magic words allowed.
         */
        'namespace'            => null,
        /**
         * notcategory= Cat1
         * notcategory = Cat2
         * ...
         * Means pages can be NEITHER in category Cat1 NOR in Cat2 NOR...
         * @todo define 'notcategory' options (retrieve list of categories from 'categorylinks' table?)
         */
        'notcategory'          => null,
        'notcategorymatch'     => null,
        'notcategoryregexp'    => null,
        /**
         * notnamespace= Ns1
         * notnamespace= Ns2
         * ...
         * [Special value] NsX='' (empty string without quotes) means Main namespace
         * Means pages have to be NEITHER in namespace Ns1 NOR Ns2 NOR...
         * Magic words allowed.
        */
        'notnamespace'         => null,
        /**
         * title is the exact name of a page; this is useful if you want to use DPL
         * just for contents inclusion; mode=userformat is automatically implied with title=
        */
        'title'		           => null,
        /**
         * titlematch is a (SQL-LIKE-expression) pattern
         * which restricts the result to pages matching that pattern
        */
        'title<'	           => null,
        'title>'	           => null,
        'scroll'               => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'), 
        'titlematch'           => null,
        'titleregexp'          => null,
        'userdateformat'	   => null,  // depends on behaveAs... mode
        'updaterules'          => array('default' => ''),
        'deleterules'          => array('default' => ''),

        /**
         * nottitlematch is a (SQL-LIKE-expression) pattern
         * which excludes pages matching that pattern from the result
        */
        'nottitlematch'        => null,
        'nottitleregexp'       => null,
        'order'				   => null,  // depends on behaveAs... mode
        /**
         * we can specify something like "latin1_swedish_ci" for case insensitive sorting
        */
        'ordercollation' => array('default' => ''),
        /**
         * 'ordermethod=param1,param2' means ordered by param1 first, then by param2.
         * @todo: add 'ordermethod=category,categoryadd' (for each category CAT, pages ordered by date when page was added to CAT).
         */
        'ordermethod'          => null, // depends on behaveAs... mode
        /**
         * minoredits =... (compatible with ordermethod=...,firstedit | lastedit only)
         * - exclude: ignore minor edits when sorting the list (rev_minor_edit = 0 only)
         * - include: include minor edits
         */
        'minoredits'           => array('default' => 'include', 'exclude', 'include'),
        /**
         * lastrevisionbefore = select the latest revision which was existent before the specified point in time
         */
        'lastrevisionbefore'   => array('default' => '', 'pattern' => '#^[-./:0-9]+$#'),
        /**
         * allrevisionsbefore = select the revisions which were created before the specified point in time
         */
        'allrevisionsbefore'   => array('default' => '', 'pattern' => '#^[-./:0-9]+$#'),
        /**
         * firstrevisionsince = select the first revision which was created after the specified point in time
         */
        'firstrevisionsince'   => array('default' => '', 'pattern' => '#^[-./:0-9]+$#'),
        /**
         * allrevisionssince = select the latest revisions which were created after the specified point in time
         */
        'allrevisionssince'    => array('default' => '', 'pattern' => '#^[-./:0-9]+$#'),
        /**
         * Minimum/Maximum number of revisions required
         */
        'minrevisions'         => array('default' => '', 'pattern' => '/^\d*$/'),
        'maxrevisions'         => array('default' => '', 'pattern' => '/^\d*$/'),
        /**
         * noresultsheader / footer is some wiki text which will be output (instead of a warning message)
         * if the result set is empty; setting 'noresultsheader' to something like ' ' will suppress
         * the warning about empty result set.
         */
        'suppresserrors'       => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'), 
        'noresultsheader'      => array('default' => ''),
        'noresultsfooter'      => array('default' => ''),
        /**
         * oneresultsheader / footer is some wiki text which will be output
         * if the result set contains exactly one entry.
         */
        'oneresultheader'      => array('default' => ''),
        'oneresultfooter'      => array('default' => ''),
        /**
         * openreferences =...
         * - no: excludes pages which do not exist (=default)
         * - yes: includes pages which do not exist -- this conflicts with some other options
         * - only: show only non existing pages [ not implemented so far ]
         */
        'openreferences'       => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'),
        /**
         * redirects =...
         * - exclude: excludes redirect pages from lists (page_is_redirect = 0 only)
         * - include: allows redirect pages to appear in lists
         * - only: lists only redirect pages in lists (page_is_redirect = 1 only)
         */
        'redirects'            => array('default' => 'exclude', 'exclude', 'include', 'only'),
        /**
         * stablepages =...
         * - exclude: excludes stable pages from lists 
         * - include: allows stable pages to appear in lists
         * - only: lists only stable pages in lists
         */
        'stablepages'          => array('default' => 'include', 'exclude', 'include', 'only'),
        /**
         * qualitypages =...
         * - exclude: excludes quality pages from lists
         * - include: allows quality pages to appear in lists
         * - only: lists only quality pages in lists
         */
        'qualitypages'         => array('default' => 'include', 'exclude', 'include', 'only'),
        /**
         * resultsheader / footer is some wiki text which will be output before / after the result list
         * (if there is at least one result); if 'oneresultheader / footer' is specified it will only be
         * used if there are at least TWO results
         */
        'resultsheader'        => array('default' => ''),
        'resultsfooter'        => array('default' => ''),
        /**
         * reset=..
         * categories: remove all category links which have been defined before the dpl call,
         * 			   typically resulting from template calls or transcluded contents
         * templates:  the same with templates
         * images:	   the same with images
         * links:  	   the same with internal and external links, throws away ALL links, not only DPL generated links!
         * all		   all of the above
         */
        'reset'                => array( 'default' => '', 'categories', 'templates', 'links', 'images', 'all', 'none'),
        /**
         * fixcategory=..   prevents a category from being reset
         */
        'fixcategory'          => array( 'default' => ''),
        /**
         * number of rows for output, default is 1
         * note: a "row" is a group of lines for which the heading tags defined in listseparators/format will be repeated
         */
        'rows'                 => array('default' => '', 'pattern' => '/^\d+$/'),
        /**
         * number of elements in a rows for output, default is "all"
         * note: a "row" is a group of lines for which the heading tags defined in listeseparators will be repeated
         */
        'rowsize'              => array('default' => '', 'pattern' => '/^\d+$/'),
        /**
         * the html tags used for columns and rows
         */
        'rowcolformat'         => array('default' => ''),
        /**
         * secseparators  is a sequence of pairs of tags used to separate sections (see "includepage=name1, name2, ..") 
         * each pair corresponds to one entry in the includepage command
         * if only one tag is given it will be used for all sections as a start tag (end tag will be empty then)
         */
        'secseparators'        => array('default' => ''),
        /**
         * multisecseparators is a list of tags (which correspond to the items in includepage)
         * and which are put between identical sections included from the same file
         */
        'multisecseparators'   => array('default' => ''),
        /**
         * dominantSection is the number (starting from 1) of an includepage argument which shall be used
         * as a dominant value set for the creation of additional output rows (one per value of the 
         * dominant column
         */
        'dominantsection'      => array('default' => '0', 'pattern' => '/^\d*$/'),
        /**
         * showcurid creates a stable link to the current revision of a page
         */
        'showcurid'        	   => array('default' => 'false', 'true', 'no', 'yes', '0', '1', 'off', 'on'),
        /**
         * shownamespace decides whether to show the namespace prefix or not
         */
        'shownamespace'        => array('default' => 'true', 'false', 'no', 'yes', '0', '1', 'off', 'on'),
        /**
         * replaceintitle applies a regex replacement to %TITLE%
         */
        'replaceintitle'       => array('default' => ''),
        /**
         * table is a short hand for combined values of listseparators, colseparators and mulicolseparators
         */
        'table'			       => array('default' => ''),
        /**
         * tablerow allows to define individual formats for table columns
         */
        'tablerow'		       => array('default' => ''),
        /**
         * The number (starting with 1) of the column to be used for sorting
         */
        'tablesortcol'	       => array('default' => '0', 'pattern' => '/^-?\d*$/'),
        /**
         * Max # characters of page title to display.
         * Empty value (default) means no limit.
         * Not applicable to mode=category.
         */
        'titlemaxlength'       => array('default' => '', 'pattern' => '/^\d*$/')
    );
}
?>