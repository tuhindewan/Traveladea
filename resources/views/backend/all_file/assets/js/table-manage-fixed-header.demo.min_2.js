/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7 & Bootstrap 4.0.0-Alpha 6
Version: 3.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v3.0/admin/html/
*/var handleDataTableFixedHeader=function(){"use strict";0!==$("#data-table").length&&$("#data-table").DataTable({lengthMenu:[20,40,60],fixedHeader:{header:!0,headerOffset:$("#header").height()},responsive:!0})},TableManageFixedHeader=function(){"use strict";return{init:function(){handleDataTableFixedHeader()}}}();