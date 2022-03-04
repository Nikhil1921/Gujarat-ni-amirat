<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= APP_NAME ?></title>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
</head>

<body>
<style>
    * {
  margin: 0;
  box-sizing: border-box;
}

html {
  scroll-snap-type: y mandatory;
}

body {
  color: white;
  background-color: black;
  height: 100vh;
  display: grid;
  place-items: center;
}

.app__videos {
  position: relative;
  height: 100vh;
  background-color: white;
  overflow: scroll;
  width: 100%;
  /* max-width: 400px; */
  scroll-snap-type: y mandatory;
  border-radius: 20px;
}

.app__videos::-webkit-scrollbar {
  display: none;
}

.app__videos {
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.video {
  position: relative;
  height: 100%;
  width: 100%;
  background-color: white;
  scroll-snap-align: start;
}

.video__player {
  object-fit: cover;
  width: 100%;
  height: 100%;
}

@media (max-width: 425px) {
  .app__videos {
    width: 100%;
    height: 100%;
    max-width: 100%;
    border-radius: 0;
  }
}

/* video header */

.videoHeader {
  position: absolute;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.videoHeader * {
  padding: 20px;
}

/* video footer */

.videoFooter {
  position: relative;
  bottom: 100px;
  margin-left: 20px;
}

.videoFooter__text {
  position: absolute;
  bottom: 0;
  color: white;
  display: flex;
  align-items: center;
  margin-bottom: 45px;
}

.user__avatar {
  /* border-radius: 50%; */
  width: 30%;
  height: 30%;
}

.videoFooter__text h3 {
  margin-left: 10px;
}

.videoFooter__text h3 button {
  color: white;
  font-weight: 900;
  text-transform: inherit;
  background: rgba(0, 0, 0, 0.5);
  border: none;
  padding: 5px;
}

.videoFooter__ticker {
  width: 60%;
  margin-left: 30px;
  margin-bottom: 20px;
  height: fit-content;
}

.videoFooter__ticker marquee {
  font-size: 12px;
  padding-top: 7px;
  color: white;
}

.videoFooter__ticker .material-icons {
  position: absolute;
  left: 5px;
  color: white;
}

.videoFooter__actions {
  display: flex;
  position: absolute;
  width: 95%;
  justify-content: space-between;
  color: white;
}

.videoFooter__actionsLeft .material-icons {
  padding: 0 7px;
  font-size: 1.6em;
}

.videoFooter__actionsRight .material-icons {
  font-size: 25px;
}

.videoFooter__actionsRight {
  display: flex;
}

.videoFooter__stat {
  display: flex;
  align-items: center;
  margin-right: 10px;
}

.videoFooter__stat p {
  margin-left: 3px;
}

</style>
<div class="app__videos">
    <?php foreach($videos as $v): ?>
    <div class="video">
    <!-- header starts -->
    <div class="videoHeader">
        <span class="material-icons">  </span>
        <h3><?= APP_NAME ?></h3>
        <span class="material-icons">  </span>
    </div>
    <!-- header ends -->

    
    <video class="video__player" src="<?= base_url('videos/'.$v['video']) ?>"></video>
    
    <!-- footer starts -->
    <div class="videoFooter">
        <div class="videoFooter__text">
        <img class="user__avatar" src="<?= base_url('assets/images/favicon.png') ?>" alt="" />
        
        </div>

        <div class="videoFooter__ticker">
        <marquee><h3><?= $v['title'] ?></h3></marquee>
        </div>
    </div>
    <!-- footer ends -->
    </div>
    <?php endforeach ?>
</div>

<script>
    const videos = document.querySelectorAll('video');

    for (const video of videos) {
      video.addEventListener('click', function () {
          if (video.paused) {
            video.play();
          } else {
            video.pause();
          }
      });
    }
</script>
</body>

</html>