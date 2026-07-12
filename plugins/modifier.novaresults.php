<?php

function smarty_cms_modifier_novaresults($params)
{
$wid = 'aviaekspresas';
$sLang = 'lt';
echo "
<script src=\"\common\js\jquery.min.js\"></script>
<script src=\"\common\js\jquery.ba-postmessage.js\"></script>
<script type=\"text/javascript\">
wid = '{$wid}';
lang = '{$sLang}';

 $(function(){

    var if_height;

    var src = 'http://www.novaturas.lt/iframe_site/'+wid+'/'+lang+'/#' + encodeURIComponent( document.location.href );
";


    if(((!isset($_REQUEST['uri']) || empty($_REQUEST['uri'])) && isset($_REQUEST['search']) && is_array($_REQUEST['search']))||(isset($_REQUEST['nova_ifredirect']) && !empty($_REQUEST['nova_ifredirect']))) {

        $_REQUEST['uri'] = 'http://www.novaturas.lt/iframe_site/'.$wid.'/'.$sLang.'/index/step1/search/';

        if (isset($_REQUEST['nova_ifredirect']) && !empty($_REQUEST['nova_ifredirect'])) {

            $aParts = explode('|', $_REQUEST['nova_ifredirect']);

            if (is_array($aParts) && !empty($aParts))   { 

                $sEndUrl = implode('/', $aParts)."/";

                $_REQUEST['uri'] =  'http://www.novaturas.lt/iframe_site/'.$wid.'/'.$sLang.'/index/'.$sEndUrl;

            }

        }

    

        if(!empty($_REQUEST))

        {

            $search = $_REQUEST['search'];

        

            if(!empty($search))

            {

                foreach($search as $key => $val)

                {

                    if($key == 's_country')

                    {

                        if($_REQUEST['travelType'] == 'roundtrip' || $_REQUEST['travelType'] == 'longhaul')

                        {

                           $key = 's_dcountry';

                        }

                        elseif($_REQUEST['travelType'] == 'beach')

                        {

                            // dont need to send country param for beach, only city is needed

                            continue;

                        }

        

                        $val = $_REQUEST['travelType'].'-'.$search['s_country'];

                    }

                    elseif($key == 's_city')

                    {

                        if($_REQUEST['travelType'] == 'roundtrip' || $_REQUEST['travelType'] == 'longhaul')

                        {

                            // dont need to send city param for roundtrip and longhaul, only dcountry is needed

                           continue;

                        }

                        elseif($_REQUEST['travelType'] == 'beach')

                        {

                            $val = 'beach-'.$search['s_country'];

                            if(!empty($search['s_city']))

                            {

                                $val .= '-'.$search['s_city'];

                            }

                        }

                    }

        

                    // childs age

                    if($key == 's_childs_age')

                    {

                        if(!empty($val) && is_array($val))

                        {

                            $newVal = $val;

                            $val = '';

                            foreach($newVal as $childAge)

                            {

                                $val .= $childAge.'-';

                            }

                            $val = rtrim($val, '-');

                        }

                    }

        

                    if(!empty($val))

                    {

                        $_REQUEST['uri'] .= "".$key."/".$val."/";

                    }

                }

                if (isset($_REQUEST['travelType']) && $_REQUEST['travelType']) {

                    $_REQUEST['uri'] .= "s_travel_type/".$_REQUEST['travelType']."/";

                }

            }

        

        }

    }



    if(isset($_REQUEST['uri']) && isset($_REQUEST['search']) && is_array($_REQUEST['search']) &&(!isset($_REQUEST['nova_ifredirect']) || empty($_REQUEST['nova_ifredirect']))) {


echo "            $('#iframe').append('<iframe id=\"iFrameObj\" src=\"\" width=\"750\" height=\"250\" name=\"novaIframe\" scrolling=\"no\" frameborder=\"0\"></iframe>');        

            $('#iframeForm').attr( \"action\", '{$_REQUEST['uri']};#' + encodeURIComponent( document.location.href ));

            $('#iFrameObj').attr( \"src\", '{$_REQUEST['uri']};#' + encodeURIComponent( document.location.href ));";

        foreach ( $_REQUEST['search'] as $key => $value ) {

            if(is_array($value)) {

                foreach ( $value as $key2 => $value2 ) { 


                 echo "   $('#iframeForm').append('<input type=\"hidden\" name=\"search[$key][$key2]\" value=\"[$value2]');\n	";

                 }

            } else {


            echo "$('#iframeForm').append('<input type=\"hidden\" name=\"search[$key]\" value=\"$value\"')\n";


            }         

        }


echo "$('#iframeForm').submit()";


    } else {

        if (isset($_REQUEST['nova_ifredirect']) && !empty($_REQUEST['nova_ifredirect'])) {

            echo "src = '".$_REQUEST['uri']."';";

        }


        echo "$('#iframe').append('<iframe id=\"iFrameObj\" src=\"' + src + '\" width=\"750\" height=\"50\" name=\"novaIframe\" scrolling=\"no\" frameborder=\"0\"></iframe>' );";


    }

echo "

      $.receiveMessage(function(e){

        var h = Number( e.data.replace( /.*if_height=(d+)(?:&|$)/, '$1' ) );

        if ( !isNaN( h ) && h > 0 && h !== if_height ) {

          $('#iFrameObj').height( if_height = h );

        }

      }, 'http://www.novaturas.lt' );

    });

</script>
";

echo '<div style="display:none;">
            <form id="iframeForm" action="" method="POST" target="novaIframe"></form>
        </div>
        <div id="iframe" class="clear" style="background:url(\'http://www.novaturas.lt/iframe_site/public/images/load.gif\') center center no-repeat;"></div>';
}
// EOF
?>
