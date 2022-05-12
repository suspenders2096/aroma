<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Личный кабинет пользователя</title>
  </head>

  <body>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" id="profileTab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Профиль</a>
                    <a class="nav-link" id="messagesTab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Сообщения</a>
                    <a class="nav-link" id="settingsTab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Настройки</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">Страница с профилем</div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Страница с сообщениями</div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Страница с настройками</div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  


    <script>
      let path = location.pathname.split("/")[2];
      // $(window).on("popstate", function(e) {
      //   let pathPop = location.pathname.split("/")[2]
      //   if (pathPop == "profile") {
      //     $('#v-pills-profile').tab('show');
      //   } else if (pathPop == "messages") {
      //     $('#v-pills-messages').tab('show');
      //   } else if (pathPop == "settings") {
      //     $('#v-pills-settings').tab('show');
      //   }
      //   document.getElementById(path + "Tab").classList.add("active");
      // })
      addEventListener('popstate', event => {
        let pathPop = location.pathname.split("/")[2]
        if (pathPop == "profile") {
          $('#profileTab').tab('show');
          console.log(pathPop);
        } else if (pathPop == "messages") {
          $('#messagesTab').tab('show');
          console.log(pathPop);
        } else if (pathPop == "settings") {
          $('#settingsTab').tab('show');
          console.log(pathPop);
        }
      });
      if (path == "profile") {
        $('#v-pills-profile').tab('show');
        //console.log(path);
      } else if (path == "messages") {
        $('#v-pills-messages').tab('show');
        //console.log(path);
      } else if (path == "settings") {
        $('#v-pills-settings').tab('show');
        //console.log(path);
      } else {
        location.href = location.protocol + "//" + location.host;
      }
      document.getElementById(path + "Tab").classList.add("active");
      let navLinks = document.querySelectorAll(".nav-link");
      for (let i = 0; i < navLinks.length; i++) {
        navLinks[i].addEventListener("click", () => {
          let page = navLinks[i].getAttribute("aria-controls").split("v-pills-")[1];
          console.log(page);
          history.pushState('', '', page);
        })
      }
  </script>

  </body>
</html>
