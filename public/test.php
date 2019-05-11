<!DOCTYPE html>
<html>
	<head>
		<title>Notifs Messages</title>
		<meta charset="UTF-8" />
		<script src="js/jquery.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$("#msgUser").focus();

				$('<audio id="beepAudio"><source type="audio/mpeg" src="notif.mp3">').appendTo('body');

				$("#sendButton").click(function(){
					var msg = $("#msgUser").val().trim();
					$("#msgUser").val('');
					$("#msgUser").focus();

					if(msg.length > 0){
						$("<li></li>").html('<img src="me.png" alt=""><span>'+msg+'</span>').appendTo("#chatMsg");
						$("#chatContent").animate({"scrollTop":$("#chatContent").height()}, "slow");
						$("#beepAudio").get(0).play();

					}
				});

				$("#msgUser").keypress(function(event){
					if(event.which == 13){
						if($("#enter").prop("checked")){
							event.preventDefault();
							$("#sendButton").click();
						}
					}

				});
			})
		</script>

		<style>
			*{margin:0;padding:0;}
			body{background-color: #f2f2f2; font-family: "Trebuchet MS", sans-serif;font-size: 14px;}
			h1{text-align: center; text-shadow: 2px 2px 3px #ccc; font-size: 42px;}
			#chatBox{
				width: 420px;
				border: 1px solid #000;
				border-radius: 5px;
				margin: auto;
				background-color: #ccc;
			}

			#chatContent{
				max-height: 200px;
				overflow-y: auto;
				max-width: inherit;
			}

			#chatMsg{
				list-style-type: none;
			}

			#chatMsg > li{
				padding: 5px;
				margin: 10px 0px 4px 0px;
				clear: both;
			}

			#chatMsg > li> img{
				float: left;
				border: 1px solid #FFF;
			}

			#chatMsg > li > span{
				float: left;
				margin-left: 5px;
				width: 350px;
			}

			#msgUser{
				width: 300px;
				border: 1px solid #222;
				padding: 5px;
				margin: 5px;
			}

			#sendButton{
				border: 1px solid #222;
				padding: 4px;
				background-color: #3b5998;
				color: #FFF;
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<h1>Chat Facebook Reprise #1</h1>
		
		<div id="chatBox">
			
			<div id="chatContent">
				
				<ul id="chatMsg">
					<li><img src="me.png" alt=""><span>Salut les amis!</span></li>
					<li><img src="me.png" alt=""><span>Comment allez vous?</span></li>
				</ul>

			</div>
			
			<input type="text" id="msgUser" placeholder="Entrer votre message"/>
			<input type="button" value="Envoyer" id="sendButton"> <br/>
			&nbsp;&nbsp;<input type="checkbox" id="enter"> Envoi du message avec la touche "Entrée"

		</div>
	</body>
</html>