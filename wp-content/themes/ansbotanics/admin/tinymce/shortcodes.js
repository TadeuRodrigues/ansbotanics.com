// Creates a new plugin class and a custom listbox
tinymce.create('tinymce.plugins.shortcodes', {
    createControl: function(n, cm) {
        switch (n) {
            case 'shortcodes':
                var mlb = cm.createListBox('shortcodes', {
                    title : 'Shortcodes',
                    onselect : function(v) {
                    
                        // Get selected text
                        tinyMCE.execCommand('mceInsertContent',false,v);
                    
                    }
                });
                
                // Add some values to the list box
                mlb.add('Dropcap', '[dropcap][/dropcap]');
                mlb.add('Pullquote Left', '[pullquote_left][/pullquote_left]');
                mlb.add('Pullquote Right', '[pullquote_right][/pullquote_right]');
                mlb.add('Tabs', '[tabs]'+"\r\n"+'[tab title="your title here"]your content here[/tab]'+"\r\n"+'[/tabs]');
                mlb.add('Toggle', '[toggle title="your title here"]your content here[/toggle]');
                mlb.add('Item List', '[itemlist][/itemlist]'); 
                mlb.add('Bullet List', '[bulletlist][/bulletlist]');
                mlb.add('Check List', '[checklist][/checklist]');
                mlb.add('Arrow List', '[arrowlist][/arrowlist]');
                mlb.add('Image', '[image source="" align=""]');
                mlb.add('Info Box', '[info][/info]');
                mlb.add('Success Box', '[success][/success]');
                mlb.add('Warning Box', '[warning][/warning]');
                mlb.add('Error Box', '[error][/error]');
                mlb.add('Quote Box', '[quotebox][/quotebox]');
                mlb.add('Button', '[button link=""][/button]');
                mlb.add('Google Map', '[gmap width="" height="" latitude="" longitude="" zoom="" html="" popup=""]');
                mlb.add('Youtube Video', '[youtube_video id= width="" height=""]');
                mlb.add('Vimeo Video', '[vimeo_video id= width="" height=""]');
                mlb.add('Services List', '[serviceslist parent_page="" num=6 orderby="date"]');
                mlb.add('Blog List', '[bloglist cat="include your category ID\'s in comma-separated" num=4 paging="true"]');        
                mlb.add('Page List', '[pagelist parent_page="" num=6 orderby="date" style="3col"]');
                mlb.add('Post List', '[postlist category="" num=4 orderby="date" style="2col"]');
                mlb.add('Slideshow', '[slideshow type="post|portfolio" category="" num=4 transition="random" speed=3000 width= height=]');               
                mlb.add('One Fourth', '[col_14][/col_14]');
                mlb.add('One Fourth (last)', '[col_14_last][/col_14_last]');
                mlb.add('One Third', '[col_13][/col_13]');
                mlb.add('One Third (last)', '[col_13_last][/col_13_last]');
                mlb.add('One Half', '[col_12][/col_12]');
                mlb.add('One Half (last)', '[col_12_last][/col_12_last]');
                mlb.add('Two Third', '[col_23][/col_23]');
                mlb.add('Three Fourth (last)', '[col_34][/col_34]');
            return mlb;                

        }
        return null;
    }
});
// Register plugin with a short name
tinymce.PluginManager.add('shortcodes', tinymce.plugins.shortcodes);
tinyMCE.init({
  plugins : 'shortcodes', // - means TinyMCE will not try to load it
  theme_advanced_buttons1 : 'shortcodes' // Add the new example listbox to the toolbar
});