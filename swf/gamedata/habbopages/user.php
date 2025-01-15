Alerta de Evento
<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comet";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o parâmetro id foi passado na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta o banco de dados para obter as informações do jogador com o id informado
    $sql = "SELECT username, motto, figure, reg_date, achievement_points, banner FROM players WHERE id = $id";
    $result = $conn->query($sql);

    // Verifica se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $motto = $row['motto'];
        $figure = $row['figure'];
        $reg_date = $row['reg_date'];
        $achievement_points = $row['achievement_points'];
        $banner = $row['banner'];
    } else {
        echo "<p>Nenhum usuário encontrado com id $id</p>";
    }
} else {
    echo "<p>O parâmetro id não foi informado na URL</p>";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
<body><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
</font></font><script src="/cdn-cgi/apps/head/-4lYaWrP5-sMvVmeUIypW-BKMQY.js"></script><link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/assets/style/style.css?v=29-03-23 10:20:55">
<script type="text/javascript" src="https://beta.habbocity.me/assets/js/jquery.js?v=29-03-23 10:20:55"></script>

<link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/assets/comp/tabs/comp-tabs.css?v=29-03-23 10:20:55">
<link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/assets/comp/popup/comp-popup.css?v=29-03-23 10:20:55">
<link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/assets/comp/players/research/comp-players-research.css?v=29-03-23 10:20:55">
<link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/assets/comp/buttons/comp-buttons.css?v=29-03-23 10:20:55">
<link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/assets/comp/uploader/comp-uploader.css?v=29-03-23 10:20:55">
<link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/assets/comp/notification/comp-notification.css?v=29-03-23 10:20:55">
<link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/assets/comp/loader/comp-loader.css?v=29-03-23 10:20:55">
<link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/modules/profile/module-profile.css?v=29-03-23 10:20:55"><link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/modules/profile/groups/view/module-profile-groups-view.css?v=29-03-23 10:20:55">
<link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/modules/profile/groups/module-profile-groups.css?v=29-03-23 10:20:55">
<link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/modules/profile/friends/module-profile-friends.css?v=29-03-23 10:20:55">
<link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/modules/profile/topics/module-profile-topics.css?v=29-03-23 10:20:55">
<link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/modules/profile/rooms/module-profile-rooms.css?v=29-03-23 10:20:55">
<link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/modules/profile/publis/module-profile-publications.css?v=29-03-23 10:20:55">
<link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/modules/profile/photos/module-profile-photos.css?v=29-03-23 10:20:55">
<link rel="stylesheet" type="text/css" href="https://beta.habbocity.me/modules/profile/groups/view/module-profile-groups-view.css?v=29-03-23 10:20:55">
<div class="moduleProfile">
<div class="JavaScriptData ModuleProfilePlayerId"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">991651</font></font></div>
<div class="JavaScriptData ModuleProfileFigureUrl"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">https://avatar.habbocity.me/?figure=lg-281-92.fa-1206-1410.ha-1002-1410.hd-180-1.hr-839-110.ch-267-1410.sh -290-1410.ea-1401-1410&amp;direction=2&amp;head_direction=3&amp;action=wav&amp;gesture=&amp;size=m&amp;headonly=1</font></font></div>
<div class="JavaScriptData ModuleProfileBannerUrl"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">https://www.habbocity.me/swfs/c_images/site_uploads/empty.png</font></font></div>
<div class="moduleProfileLeft">
<div class="moduleProfileLeftBannerBox">
<div class="moduleProfileLeftBanner" style="background: url(/swf/c_images/banners/perfil_<?php echo $banner; ?>.png);background-repeat: no-repeat; height: 134px; border-radius: 0;">
<div class="moduleProfileLeftBannerAvatar" style="position: sticky;">
<img src="https://avatar.habbocity.me/?figure=<?php echo $figure; ?>&amp;direction=2&amp;head_direction=3">
</div>
</div>
</div>
<div class="moduleProfileLeftBadgesBox">
<div class="moduleProfileLeftBadgesBanner" style="margin-top: -21px;">
<div class="moduleProfileLeftBadgesRounder">
<img src="https://swf.habbocity.me/c_images/album1584/CALIFORNIA_UNIVERSITY_HQ.gif">
<div class="moduleProfileLeftBadgesRounderInfo">
<div class="moduleProfileLeftBadgesRounderInfoTitle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Universidade da Califórnia</font></font></div>
 <div class="moduleProfileLeftBadgesRounderInfoDesc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Uma universidade como você nunca viu antes...</font></font></div>
</div>
</div>
<div class="moduleProfileLeftBadgesRounder">
<img src="https://swf.habbocity.me/c_images/album1584/ACH_RoomEntry10.gif">
<div class="moduleProfileLeftBadgesRounderInfo">
<div class="moduleProfileLeftBadgesRounderInfoTitle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Peregrino X</font></font></div>
<div class="moduleProfileLeftBadgesRounderInfoDesc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Por visitar %limit% apartamentos que não são seus. </font><font style="vertical-align: inherit;">Viagem no tempo.</font></font></div>
</div>
</div>
<div class="moduleProfileLeftBadgesRounder">
<img src="https://swf.habbocity.me/c_images/album1584/ACH_RegistrationDuration4.gif">
<div class="moduleProfileLeftBadgesRounderInfo">
<div class="moduleProfileLeftBadgesRounderInfoTitle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
40% Verdadeiro de Verdadeiro IV</font></font></div>
<div class="moduleProfileLeftBadgesRounderInfoDesc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
É membro da comunidade há %limit% dias.</font></font></div>
</div>
</div>
<div class="moduleProfileLeftBadgesRounder">
<img src="https://swf.habbocity.me/c_images/album1584/ACH_Login9.gif">
<div class="moduleProfileLeftBadgesRounderInfo">
<div class="moduleProfileLeftBadgesRounderInfoTitle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Corredor de Longa Distância IX</font></font></div>
<div class="moduleProfileLeftBadgesRounderInfoDesc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Por fazer login %limit% dias seguidos. </font><font style="vertical-align: inherit;">Extraordinário.</font></font></div>
</div>
</div>
<div class="moduleProfileLeftBadgesRounder">
</div>
<div class="moduleProfileLeftBadgesRounder">
</div>
<div class="moduleProfileLeftBadgesRounder">
</div>
</div>
</div>
</div>
<div class="moduleProfileRight">
<div class="moduleProfileRightCoverBox">
<div class="moduleProfileCover">
<div class="moduleProfileCoverBannerContainer">
<img class="BannerImage" src=""> </div>
<div class="moduleProfileCoverBannerEdit">
<div class="moduleProfileCoverBannerEditButton ModuleProfileCoverBannerEdition">
<div class="moduleProfileCoverBannerEditIcon"></div>
</div>
<div class="moduleProfileCoverBannerEditButton ModuleProfileCoverBannerDelete">
<div class="moduleProfileCoverBannerEditDeleteIcon"></div>
</div>
</div>
</div>
<div class="moduleProfileAvatar">
<img src="https://avatar.habbocity.me/?figure=<?php echo $figure; ?>&amp;direction=2&amp;head_direction=3&amp;action=wav&amp;gesture=&amp;size=m&amp;headonly=1" class="AvatarFigure"> </div>
<div class="moduleProfileAvatarEdit">
<div class="moduleProfileAvatarEditButton ModuleProfileAvatarEdition">
<div class="moduleProfileAvatarEditIcon"></div>
</div>
<div class="moduleProfileAvatarEditButton ModuleProfileAvatarDelete">
<div class="moduleProfileAvatarDeleteIcon"></div>
</div>
</div>
</div>
<div class="moduleProfileUserBox">
<div class="moduleProfileUsername"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $username; ?></font></font></div>
<div class="moduleProfileUserOnline"></div>
<div class="moduleProfileUserText"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">null</font></font></div>
<div class="moduleProfileUserText"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></div>
<div class="moduleProfileUserText"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $motto; ?></font></font></div>
</div>
<div class="moduleProfileRightInfoBox">
<div class="moduleProfileRightInfoBorder">
<div class="moduleProfileRightInfoLeft">
<div class="moduleProfileInfoTextBox">
<div class="moduleProfileIconRichess"></div>
<div class="moduleProfileRightInfoText"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">riqueza de 2,8 mil
</font></font></div>
</div>
<div class="moduleProfileInfoTextBox">
<div class="moduleProfileIconLike"></div>
<div class="moduleProfileRightInfoText"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0 Respeito(s)
</font></font></div>
</div>
<div class="moduleProfileInfoTextBox">
<div class="moduleProfileIconTime"></div>
<div class="moduleProfileRightInfoText"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Registrado em <?php echo $reg_date; ?></font></font></div>
</div>
</div>
<div class="moduleProfileRightInfoCenter"></div>
<div class="moduleProfileRightInfoRight">
<div class="moduleProfileInfoTextBox">
<div class="moduleProfileIconHeart"></div>
<div class="moduleProfileRightInfoText"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nenhuma relação</font></font></div>
</div>
<div class="moduleProfileInfoTextBox">
<div class="moduleProfileIconSmile"></div>
<div class="moduleProfileRightInfoText"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nenhuma relação</font></font></div>
</div>
<div class="moduleProfileInfoTextBox">
<div class="moduleProfileIconBobba"></div>
<div class="moduleProfileRightInfoText"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nenhuma relação</font></font></div>
</div>
</div>
</div>
</div>
<div class="moduleProfileMenu">

<div class="moduleProfileTabs TabGroups"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Grupos</font></font></div>
<div class="moduleProfileTabs TabFriends"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Amigos</font></font></div>
<div class="moduleProfileTabs TabRooms"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Apartamentos</font></font></div>
<div class="moduleProfileTabs TabTopics"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tópicos</font></font></div>
</div>
<div class="moduleProfileRightContainerBox">
<div class="moduleProfileRightContainerBorder">
<div class="moduleProfileTabsContainer"></div>
</div>
</div>
</div>
</div>