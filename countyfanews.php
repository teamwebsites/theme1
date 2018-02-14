<?php
/**
 * Template Name: County FA News
 */
?>

<?php $countyfachoice = get_theme_mod('affiliationsfa', ''); ?>



<style>
     .amateurfa #fa-amateur, .armyfa #fa-army, .bedfordshirefa #fa-bedfordshire, .berksandbucksfa #fa-berksbucks, .birminghamfa #fa-birm, .cambridgeshirefa #fa-cambr, .cheshirefa #fa-chesh, .cornwallfa #fa-cornw, .cumberlandfa #fa-cumberl, .derbyshirefa #fa-derby, .devonfa #fa-devon, .dorsetfa #fa-dorset, .durhamfa #fa-durh, .eastridingfa #fa-eastrids, .essexfa #fa-essex, .gloucestershirefa #fa-glouc, .guernseyfa #fa-guern, .hantsfa #fa-hants, .herefordshirefa #fa-hereford, .hertforshirefa #fa-herts, .huntingdownshirefa #fa-huntin, .isleofmanfa #fa-isleofman, .jerseyfa #fa-jerse, .kentfa #fa-kent, .lancashirefa #fa-lancas, .leicestershirerutlandfa #fa-leicester, .lincolnshirefa #fa-lincoln, .liverpoolfa #fa-liverpool, .londonfa #fa-lond, .manchesterfa #fa-manches, .middlesexfa #fa-middlesex, .norfolkfa #fa-norfolk, .northamptonshirefa #fa-northampt, .northridingfa #fa-northrids, .northumberlandfa #fa-northumberland, .nottinghamshirefa #fa-nottingh, .oxfordshirefa #fa-oxford, .raffa #fa-raf, .royalnavyfa #fa-royalnavy, .sheffieldfa #fa-sheffie, .shropshirefa #fa-shropsh, .somersetfa #fa-somerset, .staffordshirefa #fa-staffordsh, .suffolkfa #fa-suffolk, .surreyfa #fa-surrey, .sussexfa #fa-sussex, .westmorlandfa #fa-westmorland, .westridingfa #fa-westrids, .wiltshirefa #fa-wilts, .worcestershirefa #fa-worcester {display: block !important;}
    
    
    .countynews {display: none;}</style>

<div <?php body_class($countyfachoice); ?> id="countyfa-news">
    
    <?php
    $example_position = get_theme_mod( 'affiliationsfa' );
    if( $example_position != '' ) {
        switch ( $example_position ) {
            
            
            case 'affiliationfa':
                
            echo get_template_part( 'countyfa/county', 'basicfa' );                
                
                break;    
                
            case 'amateurfa':
                
            echo get_template_part( 'countyfa/county', 'amateur' );                
                
                break;
                
                
            case 'armyfa':
               
               echo get_template_part( 'countyfa/county', 'army' );
               
                break;
                
                
                
            case 'bedfordshirefa':
                
                echo get_template_part( 'countyfa/county', 'bedfordshire' );
                
                break; 
                
                
            case 'berksandbucksfa':
                
                echo get_template_part( 'countyfa/county', 'berksandbucks' );
                
                break; 
                
            case 'birminghamfa':
                
                echo get_template_part( 'countyfa/county', 'birmingham' );
                
                break; 
                
            case 'cambridgeshirefa':
                
                echo get_template_part( 'countyfa/county', 'cambridgeshire' );
                
                break; 
                
            case 'cheshirefa':
                
                echo get_template_part( 'countyfa/county', 'cheshire' );
                
                break; 
                
            case 'cornwallfa':
                
                echo get_template_part( 'countyfa/county', 'cornwall' );
                
                break; 
                
            case 'cumberlandfa':
                
                echo get_template_part( 'countyfa/county', 'cumberland' );
                
                break; 
                
            case 'derbyshirefa':
                
                echo get_template_part( 'countyfa/county', 'derbyshire' );
                
                break; 
                
            case 'devonfa':
                
                echo get_template_part( 'countyfa/county', 'devon' );
                
                break; 
                
            case 'dorsetfa':
                
                echo get_template_part( 'countyfa/county', 'dorset' );
                
                break; 
                
            case 'durhamfa':
                
                echo get_template_part( 'countyfa/county', 'durham' );
                
                break; 
                
            case 'eastridingfa':
                
                echo get_template_part( 'countyfa/county', 'eastriding' );
                
                break;  
                
            case 'essexfa':
                
                echo get_template_part( 'countyfa/county', 'essex' );
                
                break;
                
            case 'gloucestershirefa':
                
                echo get_template_part( 'countyfa/county', 'gloucestershire' );
                
                break;
                
            case 'guernseyfa':
                
                echo get_template_part( 'countyfa/county', 'guernsey' );
                
                break;
            
            case 'hantsfa':
                
                echo get_template_part( 'countyfa/county', 'hampshire' );
                
                break;
                
            case 'herefordshirefa':
                
                echo get_template_part( 'countyfa/county', 'herefordshire' );
                
                break;
                
            case 'hertfordshirefa':
                
                echo get_template_part( 'countyfa/county', 'hertfordshire' );
                
                break;
                
            case 'huntingdownshirefa':
                
                echo get_template_part( 'countyfa/county', 'huntingdownshire' );
                
                break;
                
            case 'isleofmanfa':
                
                echo get_template_part( 'countyfa/county', 'isleofman' );
                
                break;
                
            case 'jerseyfa':
                
                echo get_template_part( 'countyfa/county', 'jersey' );
                
                break;
                
            case 'kentfa':
                
                echo get_template_part( 'countyfa/county', 'kent' );
                
                break;
                
            case 'lancashirefa':
                
                echo get_template_part( 'countyfa/county', 'lancashire' );
                
                break;
                
            case 'leicestershirerutlandfa':
                
                echo get_template_part( 'countyfa/county', 'leicestershire' );
                
                break;
                
            case 'lincolnshirefa':
                
                echo get_template_part( 'countyfa/county', 'lincolnshire' );
                
                break;
                
            case 'liverpoolfa':
                
                echo get_template_part( 'countyfa/county', 'liverpool' );
                
                break;
                
            case 'londonfa':
                
                echo get_template_part( 'countyfa/county', 'london' );
                
                break;
                
            case 'manchesterfa':
                
                echo get_template_part( 'countyfa/county', 'manchester' );
                
                break;
                
            case 'middlesexfa':
                
                echo get_template_part( 'countyfa/county', 'middlesex' );
                
                break;
                
            case 'norfolkfa':
                
                echo get_template_part( 'countyfa/county', 'norfolk' );
                
                break;
                
            case 'northamptonshirefa':
                
                echo get_template_part( 'countyfa/county', 'northamptonshire' );
                
                break; 
                
            case 'northridingfa':
                
                echo get_template_part( 'countyfa/county', 'northriding' );
                
                break; 
                
            case 'northumberlandfa':
                
                echo get_template_part( 'countyfa/county', 'northumberland' );
                
                break; 
                
            case 'nottinghamshirefa':
                
                echo get_template_part( 'countyfa/county', 'nottinghamshire' );
                
                break; 
                
            case 'oxfordshirefa':
                
               echo get_template_part( 'countyfa/county', 'oxfordshire' ); 
                
                break; 
                
                
            case 'raffa':
                
                echo get_template_part( 'countyfa/county', 'raf' );
                
                break; 
                
            case 'royalnavyfa':
                
                echo get_template_part( 'countyfa/county', 'royalnavy' );
                
                break;
                
                
            case 'sheffieldfa':
                
                echo get_template_part( 'countyfa/county', 'sheffield' );
                
                break;
                
            case 'shropshirefa':
                
                get_template_part( 'countyfa/county', 'shropshire' );
                
                break;
                
            case 'somersetfa':
                
                echo get_template_part( 'countyfa/county', 'somerset' );
                
                break;
                
            case 'staffordshirefa':
                
                echo get_template_part( 'countyfa/county', 'staffordshire' );
                
                break;
                
            case 'suffolkfa':
                
                echo get_template_part( 'countyfa/county', 'suffolk' );
                
                break;
                
            case 'surreyfa':
                
                echo get_template_part( 'countyfa/county', 'surrey' );
                
                break;
                
                
            case 'sussexfa':
                
               echo get_template_part( 'countyfa/county', 'sussex' ); 
                
                break;
                
            case 'westmorlandfa':
                
                echo get_template_part( 'countyfa/county', 'westmorland' );
                
                break;  
                
            case 'westridingfa':
                
                echo get_template_part( 'countyfa/county', 'westriding' );
                
                break; 
                
                
            case 'wiltshirefa':
                
                get_template_part( 'countyfa/county', 'wiltshire' );
                
                break; 
                
            case 'worcestershirefa':
                
                echo get_template_part( 'countyfa/county', 'worcestershire' );
                
                break;    
                  
                
        }
        
    }
    else {echo "<p>No County FA selected.</p><p>Note that once a local FA has been chosen, if available, our system automatically displays the County's latest news here.</p>";}
?> 
 
 
 
    
    
    
</div>

                
                
                
            



<style>.county-newsarticle:hover .article-para, .county-newsarticle:focus .article-para {color: grey !important} .county-newsarticle div {padding-right: 6px;} .county-newsarticle h2 {font-weight: 400; font-size: 19px;} .county-newsarticle .publish-date {font-weight: 400; font-size: 14px; margin-top: 5px !important; margin-bottom: 7px !important;} .county-newsarticle .article-para{font-size: 13px; font-weight: 300; margin-top: 0px !important; margin-bottom: 0px !important;} .county-newsarticle p {font-family: 'Oswald', sans-serif;} .county-newsarticle a {color: #000 !important; text-decoration: none !important;} .county-newsarticle .read-more {font-size: 13px; padding: 6px; background: #eee; display: inline-block; width: auto; margin-top: 7px;text-transform: uppercase;} .county-newsarticle {margin-bottom: 14px; width: 33.3%; float: left; display: block; color: #000; font-family: 'Oswald', sans-serif !important;}  @media screen and (max-width: 950px) {.county-newsarticle {width: 50% !important;}}  @media screen and (min-width: 951px) { .county-newsarticle:nth-child(3n+4){clear:left;} } </style>