import "./bootstrap";

//jQuery
import $ from "jquery";
//dropify
import "dropify/dist/js/dropify.min.js";
import "dropify/dist/css/dropify.min.css";

window.$ = $;
window.jQuery = $;

/*
|--------------------------------------------------------------------------
| DATATABLES CORE
|--------------------------------------------------------------------------
*/

import DataTable from "datatables.net-bs5";
import "datatables.net-bs5/css/dataTables.bootstrap5.min.css";

/*
|--------------------------------------------------------------------------
| EXTENSIONS
|--------------------------------------------------------------------------
*/

// AutoFill
import "datatables.net-autofill-bs5";
import "datatables.net-autofill-bs5/css/autoFill.bootstrap5.min.css";

// Buttons
import "datatables.net-buttons-bs5";
import "datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css";

// ColReorder
import "datatables.net-colreorder-bs5";
import "datatables.net-colreorder-bs5/css/colReorder.bootstrap5.min.css";

// ColumnControl
import "datatables.net-columncontrol-bs5";
import "datatables.net-columncontrol-bs5/css/columnControl.bootstrap5.min.css";

// FixedColumns
import "datatables.net-fixedcolumns-bs5";
import "datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css";

// FixedHeader
import "datatables.net-fixedheader-bs5";
import "datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css";

// KeyTable
import "datatables.net-keytable-bs5";
import "datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css";

// RowGroup
import "datatables.net-rowgroup-bs5";
import "datatables.net-rowgroup-bs5/css/rowGroup.bootstrap5.min.css";

// RowReorder
import "datatables.net-rowreorder-bs5";
import "datatables.net-rowreorder-bs5/css/rowReorder.bootstrap5.min.css";

// Responsive
import "datatables.net-responsive-bs5";
import "datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css";

// Scroller
import "datatables.net-scroller-bs5";
import "datatables.net-scroller-bs5/css/scroller.bootstrap5.min.css";

// SearchBuilder
import "datatables.net-searchbuilder-bs5";
import "datatables.net-searchbuilder-bs5/css/searchBuilder.bootstrap5.min.css";

// SearchPanes
import "datatables.net-searchpanes-bs5";
import "datatables.net-searchpanes-bs5/css/searchPanes.bootstrap5.min.css";

// Select
import "datatables.net-select-bs5";
import "datatables.net-select-bs5/css/select.bootstrap5.min.css";

// StateRestore
import "datatables.net-staterestore-bs5";
import "datatables.net-staterestore-bs5/css/stateRestore.bootstrap5.min.css";

/*
|--------------------------------------------------------------------------
| BUTTONS EXPORT
|--------------------------------------------------------------------------
*/

// HTML5 export buttons
import "datatables.net-buttons/js/buttons.html5";

// Print button
import "datatables.net-buttons/js/buttons.print";

// Optional: colvis
import "datatables.net-buttons/js/buttons.colVis";

// JSZip for Excel
import JSZip from "jszip";
window.JSZip = JSZip;

// PDFMake for PDF
import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";

pdfMake.vfs = pdfFonts.vfs;

/*
|--------------------------------------------------------------------------
| INIT
|--------------------------------------------------------------------------
*/

DataTable(window, $);

/*
|--------------------------------------------------------------------------
| CUSTOM JS
|--------------------------------------------------------------------------
*/
