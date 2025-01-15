Alerta de Evento
<script src="/websocket/EventAlerAddon.js?v=3"></script>
<?php
if (isset($_GET['roomId']) && isset($_GET['message']) && isset($_GET['eventName']) && isset($_GET['staffName']) && isset($_GET['staffFigure'])) {
  $roomId = $_GET['roomId'];
  $message = $_GET['message'];
  $staffName = $_GET['staffName'];
  $eventName = $_GET['eventName'];
  $staffFigure = $_GET['staffFigure'];
}
?>
<style>
.container {
	display: flex;
}
.image {
    height: auto;
    flex: 0 0 215px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.content {
    padding: 15px;
}
.author {
    display: flex;
    background: #eeeeee;
    height: 30px;
    border-radius: 8px;
    margin-top: 20px;
}
.authorFigure {
    height: 110px;
    width: 64px;
    margin-top: -41px;
}
.authorUsername {
    margin-top: 7px;
    margin-left: -10px;
}
.buttons {
    padding-right: 15px;
}
.CompButtonsFloater {
    box-shadow: unset;
}
.CompButtons {
    height: 100%;
    display: flex;
    flex-direction: row-reverse;
    width: 100%;
	justify-content: unset;
}
.CompButtons .button {
    padding: 10px;
    border-radius: 10px;
    margin-left: 10px;
    border: 1.5px solid #000;
    background: #32bf1a;
    width: fit-content;
    position: relative;
    color: white;
    cursor: pointer;
}
.CompButtons .button:hover {
    opacity: 0.9;
}
.CompButtons .button::before {
    position: absolute;
    content: "";
    height: 5px;
    border-radius: 5px;
    width: calc(100% - 10px);
    left: 5px;
    top: 3px;
    background: #9add8f;
}
a:hover {
	text-decoration: none;
}
</style>
<script>
	console.log('evento aberto')
  // Obter referência ao botão "Quero Participar"
  const queroParticiparBtn = document.getElementById('queroParticiparBtn');

  // Adicionar evento de clique ao botão
  queroParticiparBtn.addEventListener('click', () => {
    // Fechar a janela
    window.close();
  });
</script>
<div class="container">
<audio autoplay>
  <source src="/sockets/sounds/evento.mp3" type="audio/mp3">
</audio>
                    <div class="image">
                        <img src="/sockets/imgs/evento-atividade.png">
                    </div>
                    <div class="content">
                        <div>
                            <p style="font-size: 21px; margin-bottom: -13px; border-bottom: 1px solid #e4e4e4; padding-bottom: 7px; font-weight: 600;">Uhuu! Acaba de iniciar uma Atividade concorrendo a prêmios incrivéis!</p> <br><br>
							<i>Participando de atividades você poderá ganhar Raros, Emblemas e Diamantes, participar dê:</i><br><br>
							<br><h1 style="background: linear-gradient(45deg, #303030, #04b7ff); -webkit-background-clip: text; color: transparent;"><?php echo $eventName; ?></h1><br>
							➤ <b><?php echo $message; ?></b></b><br>
                        </div>
                        <div class="author">
                            <img class="authorFigure" src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $staffFigure; ?>&headonly=1&direction=3&head_direction=3&action=&gesture=&size=m">
                            <div class="authorUsername">
                               <b><?php echo $staffName; ?></b>
                            </div>
                        </div>
                    </div>
					</div>
					<div class="buttons"><div class="CompButtonsFloater" style="bottom: 15px;"><div class="CompButtons">
                <button class="button save"><a href="event:navigator/goto/<?php echo $roomId; ?>" style="color: #fff;text-decoration: none;" id="queroParticiparBtn">Quero Participar</a></button>
            </div></div></div>