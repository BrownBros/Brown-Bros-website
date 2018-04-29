<?php
  if (isset($_POST['send_mce_data'])) {
    if (isset($_POST['mce_data_area'])) {
      $edited_data = $_POST['mce_data_area'];
    } else {
      $edited_data = "Received <em>nothing</em>. Try it out.";
    }
  } else {
    $edited_data = "The editor hasn't been used <b>yet</b>.";
  }
?>
  <script src="/js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
  tinymce.init({
    selector: '#mce_data_area',
    fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt 60pt',
    plugins: 'image imagetools lists advlist codesample searchreplace preview textcolor colorpicker code media link paste table anchor autosave charmap contextmenu fullscreen help print spellchecker',
//    toolbars: 'code media codesample paste table anchor restoredraft charmap fullscreen help',
toolbar: "fontselect | fontsizeselect | styleselect | forecolor backcolor | insertfile undo redo paste searchreplace | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link anchor image media | restoredraft charmap spellchecker | code codesample | print fullscreen help",

    menubar: 'file edit insert format view tools table help',
    default_link_target: "_blank",
    imagetools_proxy: '/cgi-bin/image_proxy.php',
    imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions",
    skin: 'bbhvac-dark',
    table_responsive_width: true,
    textcolor_cols: "5",
    textcolor_rows: "8",
    textcolor_map: [
      "000000", "Black",
      "993300", "Burnt orange",
      "333300", "Dark olive",
      "003300", "Dark green",
      "003366", "Dark azure",
      "000080", "Navy Blue",
      "333399", "Indigo",
      "333333", "Very dark gray",
      "800000", "Maroon",
      "FF6600", "Orange",
      "808000", "Olive",
      "008000", "Green",
      "008080", "Teal",
      "0000FF", "Blue",
      "666699", "Grayish blue",
      "808080", "Gray",
      "FF0000", "Red",
      "FF9900", "Amber",
      "99CC00", "Yellow green",
      "339966", "Sea green",
      "33CCCC", "Turquoise",
      "3366FF", "Royal blue",
      "800080", "Purple",
      "999999", "Medium gray",
      "FF00FF", "Magenta",
      "FFCC00", "Gold",
      "FFFF00", "Yellow",
      "00FF00", "Lime",
      "00FFFF", "Aqua",
      "00CCFF", "Sky blue",
      "993366", "Red violet",
      "FFFFFF", "White",
      "FF99CC", "Pink",
      "FFCC99", "Peach",
      "FFFF99", "Light yellow",
      "CCFFCC", "Pale green",
      "CCFFFF", "Pale cyan",
      "99CCFF", "Light sky blue",
      "CC99FF", "Plum"
    ]

  });
  </script>
  <h1>Test drive of Tiny MCE Editor</h1>
  <h2>Use the area below to experiment with the editor</h2>
  <form method="post" action="/tiny_test" style="width:100%;" enctype="multipart/form-data">
    <textarea id="mce_data_area" name="mce_data_area" rows="13" style="width:100%;">Type and edit the content here.</textarea>
    <br>
    <input type="submit" name="send_mce_data" id="send_mce_data" value="Show Me">
  </form>
  <h2>Rendered as HTML, what was sent looks like this</h2>
  <div style="width:100%;border:1px solid red"><?php echo $edited_data; ?></div>
  <h2>What was actually sent was this</h2>
  <textarea style="width:98%" disabled="disabled"><?php echo $edited_data; ?></textarea>

