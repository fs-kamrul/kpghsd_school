<?php
// application/config/tcpdf.php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| TCPDF Configuration
|--------------------------------------------------------------------------
*/

// TCPDF Physical path
if (!defined('K_TCPDF_EXTERNAL_CONFIG')) {
    define('K_TCPDF_EXTERNAL_CONFIG', TRUE);
}

// Installation path
define('K_PATH_MAIN', FCPATH);
define('K_PATH_URL', base_url());
define('K_PATH_FONTS', APPPATH.'third_party/tcpdf/fonts/');
define('K_PATH_CACHE', APPPATH.'cache/');
define('K_PATH_URL_CACHE', K_PATH_URL.'application/cache/');
define('K_PATH_IMAGES', FCPATH.'assets/images/');

// Dejavusans font path
define('K_PATH_DEJAVU_FONTS', K_PATH_FONTS.'dejavu-fonts-ttf-2.37/ttf/');

// General configuration
define('PDF_HEADER_LOGO', '');
define('PDF_HEADER_LOGO_WIDTH', 0);
define('PDF_UNIT', 'mm');
define('PDF_PAGE_FORMAT', 'A4');
define('PDF_PAGE_ORIENTATION', 'P');
define('PDF_CREATOR', 'TCPDF');
define('PDF_AUTHOR', 'School Management System');
define('PDF_HEADER_TITLE', 'Fee Receipt');
define('PDF_HEADER_STRING', '');
define('PDF_MARGINS_LEFT', 15);
define('PDF_MARGINS_TOP', 27);
define('PDF_MARGINS_RIGHT', 15);
define('PDF_MARGINS_BOTTOM', 25);
define('PDF_HEADER_MARGIN', 5);
define('PDF_FOOTER_MARGIN', 10);

// Font settings
define('PDF_FONT_NAME_MAIN', 'dejavusans');
define('PDF_FONT_SIZE_MAIN', 10);
define('PDF_FONT_NAME_DATA', 'dejavusans');
define('PDF_FONT_SIZE_DATA', 8);
define('PDF_FONT_MONOSPACED', 'dejavusansmono');

// Image settings
define('PDF_IMAGE_SCALE_RATIO', 1.25);

// Security
define('PDF_PROTECTION', array('print', 'modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble', 'print-high'));

?>