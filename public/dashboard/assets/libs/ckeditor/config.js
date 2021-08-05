/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.removeButtons = "Flash,Superscript,Subscript,Language,Anchor,ShowBlocks,About,Print,Save,NewPage,RemoveFormat,CopyFormatting";
    config.allowedContent = true;
    config.extraAllowedContent = 'div(*)';
    config.height = 450; 
    config.width = '100%';   
};
