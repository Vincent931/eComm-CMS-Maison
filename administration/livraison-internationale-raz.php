<?php session_start();
require 'boutique0.php';

$raz=number_format($_POST['raz'],2,'.',' ');

$FR=$raz; $GP=$raz; $GF=$raz; $MQ=$raz; $YT=$raz; $PF=$raz; $RE=$raz; $MF=$raz; $PM=$raz; $TF=$raz; $AF=$raz; $AXE=$raz; $AL=$raz; $DZ=$raz; $ASS=$raz; $AD=$raz; $AO=$raz; $AI=$raz; $AQ=$raz; $AG=$raz; $AR=$raz; $AW=$raz; $AU=$raz; $AT=$raz; $AZ=$raz;
$BS=$raz; $BH=$raz; $BD=$raz; $BB=$raz; $BYY=$raz; $BE=$raz; $BZ=$raz; $BJ=$raz; $BM=$raz; $BT=$raz; $BO=$raz; $BQ=$raz; $BA=$raz; $BW=$raz; $BV=$raz; $BR=$raz; $IO=$raz; $BN=$raz; $BG=$raz; $BF=$raz; $BI=$raz; $KH=$raz; $CM=$raz; $CA=$raz; $CV=$raz;
$KY=$raz; $CF=$raz; $TD=$raz; $CL=$raz; $CN=$raz;  $CX=$raz; $CC=$raz; $CO=$raz; $KM=$raz; $CG=$raz; $CD=$raz; $CK=$raz; $CR=$raz; $CI=$raz; $HR=$raz; $CU=$raz; $CW=$raz; $CY=$raz; $CZ=$raz; $NSP=$raz; $DJ=$raz; $DM=$raz;  $DO=$raz; $CE=$raz; $EG=$raz;
$SV=$raz; $GQ=$raz; $ER=$raz; $EE=$raz; $ET=$raz; $FK=$raz; $FO=$raz; $FJ=$raz; $FI=$raz; $GM=$raz; $GE=$raz; $DE=$raz; $GH=$raz; $GI=$raz; $GR=$raz; $GL=$raz; $GD=$raz; $GU=$raz; $GT=$raz; $GG=$raz; $GN=$raz; $GW=$raz; $GY=$raz; $HT=$raz; $HM=$raz;
$VA=$raz; $HN=$raz; $HK=$raz; $HU=$raz; $ISS=$raz; $INN=$raz; $IDD=$raz; $IR=$raz; $IQ=$raz; $IE=$raz; $IM=$raz; $IL=$raz; $IT=$raz; $JM=$raz; $JP=$raz; $JE=$raz; $JO=$raz; $KZ=$raz; $KE=$raz; $KI=$raz; $KP=$raz; $KR=$raz; $KW=$raz; $KG=$raz; $LA=$raz; 
$LV=$raz; $LB=$raz; $LS=$raz; $LR=$raz; $LY=$raz; $LI=$raz; $LT=$raz; $LU=$raz; $MO=$raz; $MK=$raz; $MG=$raz; $MW=$raz; $MY=$raz; $MV=$raz; $ML=$raz; $MT=$raz; $MH=$raz; $MR=$raz; $MU=$raz; $MX=$raz; $FM=$raz; $MD=$raz; $MC=$raz; $MN=$raz; $MS=$raz;
$MA=$raz; $MZ=$raz; $MM=$raz; $NA=$raz; $NR=$raz; $NP=$raz; $NL=$raz; $NC=$raz; $NZ=$raz; $NI=$raz; $NE=$raz; $NG=$raz; $NU=$raz; $NF=$raz; $MP=$raz; $NO=$raz; $OM=$raz; $PK=$raz; $PW=$raz; $PS=$raz; $PA=$raz; $PG=$raz; $PY=$raz; $PE=$raz; $PH=$raz;
$PN=$raz; $PL=$raz; $PT=$raz; $PR=$raz; $QA=$raz; $RO=$raz; $RU=$raz; $RW=$raz; $BL=$raz; $SH=$raz; $KN=$raz; $LC=$raz; $VC=$raz; $WS=$raz; $MF=$raz; $ST=$raz; $SA=$raz; $SN=$raz; $RS=$raz; $SC=$raz; $SL=$raz; $SG=$raz; $SX=$raz; $SK=$raz; $SI=$raz;
$SB=$raz; $SO=$raz; $ZA=$raz; $GS=$raz; $SS=$raz; $ES=$raz; $LK=$raz; $SD=$raz; $SR=$raz; $SJ=$raz; $SZ=$raz; $SE=$raz; $CH=$raz; $SY=$raz; $TW=$raz; $TJ=$raz; $TZ=$raz; $TH=$raz; $TL=$raz; $TG=$raz; $TK=$raz; $TOO=$raz; $TT=$raz; $TN=$raz; $TR=$raz;
$TM=$raz; $TC=$raz; $TV=$raz; $UG=$raz; $UA=$raz; $AE=$raz; $GB=$raz; $US=$raz; $UM=$raz; $UY=$raz; $UZ=$raz; $VU=$raz; $VE=$raz; $VN=$raz; $VG=$raz; $VI=$raz; $WF=$raz; $EH=$raz; $YE=$raz; $ZM=$raz; $ZW=$raz;
//1-ASS=AS=Samoa américaines-------2-BYY=BY=Biélorussie---------5-ISS=IS=islande----INN=IN=Inde----IDD=ID=Indonésie--------9-TOO=TO=Tonga
$req0=$bdd->query('SELECT* FROM pays10');
$exist=$req0->rowCount();
if ($exist>0){

$req=$bdd->prepare('UPDATE pays1 SET FR=:FR, GP=:GP, GF=:GF, MQ=:MQ, YT=:YT, PF=:PF, RE=:RE, MF=:MF, PM=:PM, TF=:TF, AF=:AF, AXE=:AXE, AL=:AL, DZ=:DZ, ASS=:ASS, AD=:AD, AO=:AO, AI=:AI, AQ=:AQ, AG=:AG, AR=:AR, AW=:AW, AU=:AU, AT=:AT, AZ=:AZ');
$req->execute(array('FR'=>$FR, 'GP'=>$GP, 'GF'=>$GF, 'MQ'=>$MQ, 'YT'=>$YT, 'PF'=>$PF, 'RE'=>$RE, 'MF'=>$MF, 'PM'=>$PM, 'TF'=>$TF, 'AF'=>$AF, 'AXE'=>$AXE, 'AL'=>$AL, 'DZ'=>$DZ, 'ASS'=>$ASS, 'AD'=>$AD, 'AO'=>$AO, 'AI'=>$AI, 'AQ'=>$AQ, 'AG'=>$AG, 'AR'=>$AR, 'AW'=>$AW, 'AU'=>$AU, 'AT'=>$AT, 'AZ'=>$AZ));//ASS=AS=Samoa américaines

$req2=$bdd->prepare('UPDATE pays2 SET BS=:BS, BH=:BH, BD=:BD, BB=:BB, BYY=:BYY, BE=:BE, BZ=:BZ, BJ=:BJ, BM=:BM, BT=:BT, BO=:BO, BQ=:BQ, BA=:BA, BW=:BW, BV=:BV, BR=:BR, IO=:IO, BN=:BN, BG=:BG, BF=:BF, BI=:BI, KH=:KH, CM=:CM, CA=:CA, CV=:CV');
$req2->execute(array('BS'=>$BS, 'BH'=>$BH, 'BD'=>$BD, 'BB'=>$BB, 'BYY'=>$BYY, 'BE'=>$BE, 'BZ'=>$BZ, 'BJ'=>$BJ, 'BM'=>$BM, 'BT'=>$BT, 'BO'=>$BO, 'BQ'=>$BQ, 'BA'=>$BA, 'BW'=>$BW, 'BV'=>$BV, 'BR'=>$BR, 'IO'=>$IO, 'BN'=>$BN, 'BG'=>$BG, 'BF'=>$BF, 'BI'=>$BI, 'KH'=>$KH, 'CM'=>$CM, 'CA'=>$CA, 'CV'=>$CV));//BYY=BY=Biélorussie

$req3=$bdd->prepare('UPDATE pays3 SET KY=:KY, CF=:CF, TD=:TD, CL=:CL, CN=:CN, CX=:CX, CC=:CC, CO=:CO, KM=:KM, CG=:CG, CD=:CD, CK=:CK, CR=:CR, CI=:CI, HR=:HR, CU=:CU, CW=:CW, CY=:CY, CZ=:CZ, NSP=:NSP, DJ=:DJ, DM=:DM, DO=:DO, CE=:CE, EG=:EG');
$req3->execute(array('KY'=>$KY, 'CF'=>$CF, 'TD'=>$TD, 'CL'=>$CL, 'CN'=>$CN, 'CX'=>$CX, 'CC'=>$CC, 'CO'=>$CO, 'KM'=>$KM, 'CG'=>$CG, 'CD'=>$CD, 'CK'=>$CK, 'CR'=>$CR, 'CI'=>$CI, 'HR'=>$HR, 'CU'=>$CU, 'CW'=>$CW, 'CY'=>$CY, 'CZ'=>$CZ, 'NSP'=>$NSP, 'DJ'=>$DJ, 'DM'=>$DM, 'DO'=>$DO, 'CE'=>$CE, 'EG'=>$EG));

$req4=$bdd->prepare('UPDATE pays4 SET SV=:SV, GQ=:GQ, ER=:ER, EE=:EE, ET=:ET, FK=:FK, FO=:FO, FJ=:FJ, FI=:FI, GM=:GM, GE=:GE, DE=:DE, GH=:GH, GI=:GI, GR=:GR, GL=:GL, GD=:GD, GU=:GU, GT=:GT, GG=:GG, GN=:GN, GW=:GW, GY=:GY, HT=:HT, HM=:HM');
$req4->execute(array('SV'=>$SV, 'GQ'=>$GQ, 'ER'=>$ER, 'EE'=>$EE, 'ET'=>$ET, 'FK'=>$FK, 'FO'=>$FO, 'FJ'=>$FJ, 'FI'=>$FI, 'GM'=>$GM, 'GE'=>$GE, 'DE'=>$DE, 'GH'=>$GH, 'GI'=>$GI, 'GR'=>$GR, 'GL'=>$GL, 'GD'=>$GD, 'GU'=>$GU, 'GT'=>$GT, 'GG'=>$GG, 'GN'=>$GN, 'GW'=>$GW, 'GY'=>$GY, 'HT'=>$HT, 'HM'=>$HM));

$req5=$bdd->prepare('UPDATE pays5 SET VA=:VA, HN=:HN, HK=:HK, HU=:HU, ISS=:ISS, INN=:INN, IDD=:IDD, IR=:IR, IQ=:IQ, IE=:IE, IM=:IM, IL=:IL, IT=:IT, JM=:JM, JP=:JP, JE=:JE, JO=:JO, KZ=:KZ, KE=:KE, KI=:KI, KP=:KP, KR=:KR, KW=:KW, KG=:KG, LA=:LA');
$req5->execute(array('VA'=>$VA, 'HN'=>$HN, 'HK'=>$HK, 'HU'=>$HU, 'ISS'=>$ISS, 'INN'=>$INN, 'IDD'=>$IDD, 'IR'=>$IR, 'IQ'=>$IQ, 'IE'=>$IE, 'IM'=>$IM, 'IL'=>$IL, 'IT'=>$IT, 'JM'=>$JM, 'JP'=>$JP, 'JE'=>$JE, 'JO'=>$JO, 'KZ'=>$KZ, 'KE'=>$KE, 'KI'=>$KI, 'KP'=>$KP, 'KR'=>$KR, 'KW'=>$KW, 'KG'=>$KG, 'LA'=>$LA));//ISS=IS=islande----INN=IN=Inde----IDD=ID=Indonésie

$req6=$bdd->prepare('UPDATE pays6 SET LV=:LV, LB=:LB, LS=:LS, LR=:LR, LY=:LY, LI=:LI, LT=:LT, LU=:LU, MO=:MO, MK=:MK, MG=:MG, MW=:MW, MY=:MY, MV=:MV, ML=:ML, MT=:MT, MH=:MH, MR=:MR, MU=:MU, MX=:MX, FM=:FM, MD=:MD, MC=:MC, MN=:MN, MS=:MS');
$req6->execute(array('LV'=>$LV, 'LB'=>$LB, 'LS'=>$LS, 'LR'=>$LR, 'LY'=>$LY, 'LI'=>$LI, 'LT'=>$LT, 'LU'=>$LU, 'MO'=>$MO, 'MK'=>$MK, 'MG'=>$MG, 'MW'=>$MW, 'MY'=>$MY, 'MV'=>$MV, 'ML'=>$ML, 'MT'=>$MT, 'MH'=>$MH, 'MR'=>$MR, 'MU'=>$MU, 'MX'=>$MX, 'FM'=>$FM, 'MD'=>$MD, 'MC'=>$MC, 'MN'=>$MN, 'MS'=>$MS));

$req7=$bdd->prepare('UPDATE pays7 SET MA=:MA, MZ=:MZ, MM=:MM, NA=:NA, NR=:NR, NP=:NP, NL=:NL, NC=:NC, NZ=:NZ, NI=:NI, NE=:NE, NG=:NG, NU=:NU, NF=:NF, MP=:MP, NO=:NO, OM=:OM, PK=:PK, PW=:PW, PS=:PS, PA=:PA, PG=:PG, PY=:PY, PE=:PE, PH=:PH');
$req7->execute(array('MA'=>$MA, 'MZ'=>$MZ, 'MM'=>$MM, 'NA'=>$NA, 'NR'=>$NR, 'NP'=>$NP, 'NL'=>$NL, 'NC'=>$NC, 'NZ'=>$NZ, 'NI'=>$NI, 'NE'=>$NE, 'NG'=>$NG, 'NU'=>$NU, 'NF'=>$NF, 'MP'=>$MP, 'NO'=>$NO, 'OM'=>$OM, 'PK'=>$PK, 'PW'=>$PW, 'PS'=>$PS, 'PA'=>$PA, 'PG'=>$PG, 'PY'=>$PY, 'PE'=>$PE, 'PH'=>$PH));

$req8=$bdd->prepare('UPDATE pays8 SET PN=:PN, PL=:PL, PT=:PT, PR=:PR, QA=:QA, RO=:RO, RU=:RU, RW=:RW, BL=:BL, SH=:SH, KN=:KN, LC=:LC, VC=:VC, WS=:WS, ST=:ST, SA=:SA, SN=:SN, RS=:RS, SC=:SC, SL=:SL, SG=:SG, SX=:SX, SK=:SK, SI=:SI');
$req8->execute(array('PN'=>$PN, 'PL'=>$PL, 'PT'=>$PT, 'PR'=>$PR, 'QA'=>$QA, 'RO'=>$RO, 'RU'=>$RU, 'RW'=>$RW, 'BL'=>$BL, 'SH'=>$SH, 'KN'=>$KN, 'LC'=>$LC, 'VC'=>$VC, 'WS'=>$WS, 'ST'=>$ST, 'SA'=>$SA, 'SN'=>$SN, 'RS'=>$RS, 'SC'=>$SC, 'SL'=>$SL, 'SG'=>$SG, 'SX'=>$SX, 'SK'=>$SK, 'SI'=>$SI));

$req9=$bdd->prepare('UPDATE pays9 SET SB=:SB, SO=:SO, ZA=:ZA, GS=:GS, SS=:SS, ES=:ES, LK=:LK, SD=:SD, SR=:SR, SJ=:SJ, SZ=:SZ, SE=:SE, CH=:CH, SY=:SY, TW=:TW, TJ=:TJ, TZ=:TZ, TH=:TH, TL=:TL, TG=:TG, TK=:TK, TOO=:TOO, TT=:TT, TN=:TN, TR=:TR');
$req9->execute(array('SB'=>$SB, 'SO'=>$SO, 'ZA'=>$ZA, 'GS'=>$GS, 'SS'=>$SS, 'ES'=>$ES, 'LK'=>$LK, 'SD'=>$SD, 'SR'=>$SR, 'SJ'=>$SJ, 'SZ'=>$SZ, 'SE'=>$SE, 'CH'=>$CH, 'SY'=>$SY, 'TW'=>$TW, 'TJ'=>$TJ, 'TZ'=>$TZ, 'TH'=>$TH, 'TL'=>$TL, 'TG'=>$TG, 'TK'=>$TK, 'TOO'=>$TOO, 'TT'=>$TT, 'TN'=>$TN, 'TR'=>$TR));//TOO=TO=Tonga

$req10=$bdd->prepare('UPDATE pays10 SET TM=:TM, TC=:TC, TV=:TV, UG=:UG, UA=:UA, AE=:AE, GB=:GB, US=:US, UM=:UM, UY=:UY, UZ=:UZ, VU=:VU, VE=:VE, VN=:VN, VG=:VG, VI=:VI, WF=:WF, EH=:EH, YE=:YE, ZM=:ZM, ZW=:ZW');
$req10->execute(array('TM'=>$TM, 'TC'=>$TC, 'TV'=>$TV, 'UG'=>$UG, 'UA'=>$UA, 'AE'=>$AE, 'GB'=>$GB, 'US'=>$US, 'UM'=>$UM, 'UY'=>$UY, 'UZ'=>$UZ, 'VU'=>$VU, 'VE'=>$VE, 'VN'=>$VN, 'VG'=>$VG, 'VI'=>$VI, 'WF'=>$WF, 'EH'=>$EH, 'YE'=>$YE, 'ZM'=>$ZM, 'ZW'=>$ZW));

} else {


$req=$bdd->prepare('INSERT INTO pays1 (FR, GP, GF, MQ, YT, PF, RE, MF, PM, TF, AF, AXE, AL, DZ, ASS, AD, AO, AI, AQ, AG, AR, AW, AU, AT, AZ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$req->execute(array($FR, $GP, $GF, $MQ, $YT, $PF, $RE, $MF, $PM, $TF, $AF, $AXE, $AL, $DZ, $ASS, $AD, $AO, $AI, $AQ, $AG, $AR, $AW, $AU, $AT, $AZ));//ASS=AS=Samoa américaines

$req2=$bdd->prepare('INSERT INTO pays2 (BS, BH, BD, BB, BYY, BE, BZ, BJ, BM, BT, BO, BQ, BA, BW, BV, BR, IO, BN, BG, BF, BI, KH, CM, CA, CV) VALUES(:BS, :BH, :BD, :BB, :BYY, :BE, :BZ, :BJ, :BM, :BT, :BO, :BQ, :BA, :BW, :BV, :BR, :IO, :BN, :BG, :BF, :BI, :KH, :CM, :CA, :CV)');
$req2->execute(array('BS'=>$BS, 'BH'=>$BH, 'BD'=>$BD, 'BB'=>$BB, 'BYY'=>$BYY, 'BE'=>$BE, 'BZ'=>$BZ, 'BJ'=>$BJ, 'BM'=>$BM, 'BT'=>$BT, 'BO'=>$BO, 'BQ'=>$BQ, 'BA'=>$BA, 'BW'=>$BW, 'BV'=>$BV, 'BR'=>$BR, 'IO'=>$IO, 'BN'=>$BN, 'BG'=>$BG, 'BF'=>$BF, 'BI'=>$BI, 'KH'=>$KH, 'CM'=>$CM, 'CA'=>$CA, 'CV'=>$CV));//BYY BY

$KY=$raz; $CF=$raz; $TD=$raz; $CL=$raz; $CN=$raz; $CX=$raz; $CC=$raz; $CO=$raz; $KM=$raz; $CG=$raz; $CD=$raz; $CK=$raz; $CR=$raz; $CI=$raz; $HR=$raz; $CU=$raz; $CW=$raz; $CY=$raz; $CZ=$raz; $NSP=$raz; $DJ=$raz; $DM=$raz;  $DO=$raz; $CE=$raz; $EG=$raz;
$req3=$bdd->prepare('INSERT INTO pays3 (KY, CF, TD, CL, CN, CX, CC, CO, KM, CG, CD, CK, CR, CI, HR, CU, CW, CY, CZ, NSP, DJ, DM, DO, CE, EG) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$req3->execute(array($KY, $CF, $TD, $CL, $CN, $CX, $CC, $CO, $KM, $CG, $CD, $CK, $CR, $CI, $HR, $CU, $CW, $CY, $CZ, $NSP, $DJ, $DM, $DO, $CE, $EG));

$req4=$bdd->prepare('INSERT INTO pays4 (SV, GQ, ER, EE, ET, FK, FO, FJ, FI, GM, GE, DE, GH, GI, GR, GL, GD, GU, GT, GG, GN, GW, GY, HT, HM) VALUES(:SV, :GQ, :ER, :EE, :ET, :FK, :FO, :FJ, :FI, :GM, :GE, :DE, :GH, :GI, :GR, :GL, :GD, :GU, :GT, :GG, :GN, :GW, :GY, :HT, :HM)');
$req4->execute(array('SV'=>$SV, 'GQ'=>$GQ, 'ER'=>$ER, 'EE'=>$EE, 'ET'=>$ET, 'FK'=>$FK, 'FO'=>$FO, 'FJ'=>$FJ, 'FI'=>$FI, 'GM'=>$GM, 'GE'=>$GE, 'DE'=>$DE, 'GH'=>$GH, 'GI'=>$GI, 'GR'=>$GR, 'GL'=>$GL, 'GD'=>$GD, 'GU'=>$GU, 'GT'=>$GT, 'GG'=>$GG, 'GN'=>$GN, 'GW'=>$GW, 'GY'=>$GY, 'HT'=>$HT, 'HM'=>$HM));

$req5=$bdd->prepare('INSERT INTO pays5 (VA, HN, HK, HU, ISS, INN, IDD, IR, IQ, IE, IM, IL, IT, JM, JP, JE, JO, KZ, KE, KI, KP, KR, KW, KG, LA) VALUES(:VA, :HN, :HK, :HU, :ISS, :INN, :IDD, :IR, :IQ, :IE, :IM, :IL, :IT, :JM, :JP, :JE, :JO, :KZ, :KE, :KI, :KP, :KR, :KW, :KG, :LA)');
$req5->execute(array('VA'=>$VA, 'HN'=>$HN, 'HK'=>$HK, 'HU'=>$HU, 'ISS'=>$ISS, 'INN'=>$INN, 'IDD'=>$IDD, 'IR'=>$IR, 'IQ'=>$IQ, 'IE'=>$IE, 'IM'=>$IM, 'IL'=>$IL, 'IT'=>$IT, 'JM'=>$JM, 'JP'=>$JP, 'JE'=>$JE, 'JO'=>$JO, 'KZ'=>$KZ, 'KE'=>$KE, 'KI'=>$KI, 'KP'=>$KP, 'KR'=>$KR, 'KW'=>$KW, 'KG'=>$KG, 'LA'=>$LA));//ISS=IS=islande----INN=IN=Inde----IDD=ID=Indonésie

$req6=$bdd->prepare('INSERT INTO pays6 (LV, LB, LS, LR, LY, LI, LT, LU, MO, MK, MG, MW, MY, MV, ML, MT, MH, MR, MU, MX, FM, MD, MC, MN, MS) VALUES(:LV, :LB, :LS, :LR, :LY, :LI, :LT, :LU, :MO, :MK, :MG, :MW, :MY, :MV, :ML, :MT, :MH, :MR, :MU, :MX, :FM, :MD, :MC, :MN, :MS)');
$req6->execute(array('LV'=>$LV, 'LB'=>$LB, 'LS'=>$LS, 'LR'=>$LR, 'LY'=>$LY, 'LI'=>$LI, 'LT'=>$LT, 'LU'=>$LU, 'MO'=>$MO, 'MK'=>$MK, 'MG'=>$MG, 'MW'=>$MW, 'MY'=>$MY, 'MV'=>$MV, 'ML'=>$ML, 'MT'=>$MT, 'MH'=>$MH, 'MR'=>$MR, 'MU'=>$MU, 'MX'=>$MX, 'FM'=>$FM, 'MD'=>$MD, 'MC'=>$MC, 'MN'=>$MN, 'MS'=>$MS));

$req7=$bdd->prepare('INSERT INTO pays7 (MA, MZ, MM, NA, NR, NP, NL, NC, NZ, NI, NE, NG, NU, NF, MP, NO, OM, PK, PW, PS, PA, PG, PY, PE, PH) VALUES(:MA, :MZ, :MM, :NA, :NR, :NP, :NL, :NC, :NZ, :NI, :NE, :NG, :NU, :NF, :MP, :NO, :OM, :PK, :PW, :PS, :PA, :PG, :PY, :PE, :PH)');
$req7->execute(array('MA'=>$MA, 'MZ'=>$MZ, 'MM'=>$MM, 'NA'=>$NA, 'NR'=>$NR, 'NP'=>$NP, 'NL'=>$NL, 'NC'=>$NC, 'NZ'=>$NZ, 'NI'=>$NI, 'NE'=>$NE, 'NG'=>$NG, 'NU'=>$NU, 'NF'=>$NF, 'MP'=>$MP, 'NO'=>$NO, 'OM'=>$OM, 'PK'=>$PK, 'PW'=>$PW, 'PS'=>$PS, 'PA'=>$PA, 'PG'=>$PG, 'PY'=>$PY, 'PE'=>$PE, 'PH'=>$PH));

$req8=$bdd->prepare('INSERT INTO pays8 (PN, PL, PT, PR, QA, RO, RU, RW, BL, SH, KN, LC, VC, WS, ST, SA, SN, RS, SC, SL, SG, SX, SK, SI) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$req8->execute(array($PN, $PL, $PT, $PR, $QA, $RO, $RU, $RW, $BL, $SH, $KN, $LC, $VC, $WS, $ST, $SA, $SN, $RS, $SC, $SL, $SG, $SX, $SK, $SI));

$req9=$bdd->prepare('INSERT INTO pays9 (SB, SO, ZA, GS, SS, ES, LK, SD, SR, SJ, SZ, SE, CH, SY, TW, TJ, TZ, TH, TL, TG, TK, TOO, TT, TN, TR) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$req9->execute(array($SB, $SO, $ZA, $GS, $SS, $ES, $LK, $SD, $SR, $SJ, $SZ, $SE, $CH, $SY, $TW, $TJ, $TZ, $TH, $TL, $TG, $TK, $TOO, $TT, $TN, $TR));//TOO=TO=Tonga

$req10=$bdd->prepare('INSERT INTO pays10 (TM, TC, TV, UG, UA, AE, GB, US, UM, UY, UZ, VU, VE, VN, VG, VI, WF, EH, YE, ZM, ZW) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$req10->execute(array($TM, $TC, $TV, $UG, $UA, $AE, $GB, $US, $UM, $UY, $UZ, $VU, $VE, $VN, $VG, $VI, $WF, $EH, $YE, $ZM, $ZW));

}
/*$FR=$raz; $GP=$raz; $GF=$raz, $MQ=$raz; $YT=$raz; $PF=$raz; $RE=$raz; $MF=$raz; $PM=$raz; $TF=$raz; $AF=$raz; $AXE=$raz; $AL=$raz; $DZ; $ASS; $AD; $AO; $AI; $AQ; $AG; $AR; $AW; $AU; $AT; $AZ;
$BS; $BH; $BD; $BB; $BYY; $BE; $BZ; $BJ; $BM; $BT; $BO; $BQ; $BA; $BW; $BV; $BR; $IO; $BN; $BG; $BF; $BI; $KH; $CM; $CA; $CV;
$KY; $CF; $TD; $CL; $CN;  $CX; $CC; $CO; $KM; $CG; $CD; $CK; $CR; $CI; $HR; $CU; $CW; $CY; $CZ; $NSP; $DJ; $DM;  $DO; $CE; $EG;
$SV; $GQ; $ER; $EE; $ET; $FK; $FO; $FJ; $FI; $GM; $GE; $DE; $GH; $GI; $GR; $GL; $GD; $GU; $GT; $GG; $GN; $GW; $GY; $HT; $HM;
$VA; $HN; $HK; $HU; $ISS; $INN; $IDD; $IR; $IQ; $IE; $IM; $IL; $IT; $JM; $JP; $JE; $JO; $KZ; $KE; $KI; $KP; $KR; $KW; $KG; $LA; 
$LV; $LB; $LS; $LR; $LY; $LI; $LT; $LU; $MO; $MK; $MG; $MW; $MY; $MV; $ML; $MT; $MH; $MR; $MU; $MX; $FM; $MD; $MC; $MN; $MS;
$MA; $MZ; $MM; $NA; $NR; $NP; $NL; $NC; $NZ; $NI; $NE; $NG; $NU; $NF; $MP; $NO; $OM; $PK; $PW; $PS; $PA; $PG; $PY; $PE; $PH;
$PN; $PL; $PT; $PR; $QA; $RO; $RU; $RW; $BL; $SH; $KN; $LC; $VC; $WS; $MF; $ST; $SA; $SN; $RS; $SC; $SL; $SG; $SX; $SK; $SI;
$SB; $SO; $ZA; $GS; $SS; $ES; $LK; $SD; $SR; $SJ; $SZ; $SE; $CH; $SY; $TW; $TJ; $TZ; $TH; $TL; $TG; $TK; $TO; $TT; $TN; $TR;
$TM; $TC; $TV; $UG; $UA; $AE; $GB; $US; $UM; $UY; $UZ; $VU; $VE; $VN; $VG; $VI; $WF; $EH; $YE; $ZM; $ZW;
*/
$_SESSION['message']="Tarifs Livraison internationale mémorisés";
header("Location:livraison-internationale.php");