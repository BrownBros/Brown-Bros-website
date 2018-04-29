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
  <script src="/path/to/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
  tinymce.init({
    selector: '#mytextarea'
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

