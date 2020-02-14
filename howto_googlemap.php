<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-sm btn-warning btn-lg" data-toggle="modal" data-target="#myModal">การใส่ลิ้งค์ google map</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">การเพิ่ม tag google map</h4>
        </div>
        <div class="modal-body">
        <p>สามารถทำตาม คลิปได้เลยครับ</p>
        <video width="320" height="240" controls>
            <source src=”http://techslides.com/demos/sample-videos/small.ogv” type=video/ogg>
            <source src="./vdo/google_map.mp4" type=video/mp4>
        </video>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3872.775242670855!2d100.6636805148425!3d13.912378297300338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d7c55587aa105%3A0x8cb709ea91d9c37b!2z4LiB4Lij4Li44LiH4LmA4LiX4Lie4Lih4Lir4Liy4LiZ4LiE4LijIOC5geC4guC4p-C4hyDguK3guK3guYDguIfguLTguJkg4LmA4LiC4LiV4Liq4Liy4Lii4LmE4Lir4LihIOC4geC4o-C4uOC4h-C5gOC4l-C4nuC4oeC4q-C4suC4meC4hOC4oyAxMDIyMA!5e0!3m2!1sth!2sth!4v1580830239535!5m2!1sth!2sth" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

</body>
</html>
