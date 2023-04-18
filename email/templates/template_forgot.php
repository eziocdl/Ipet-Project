<?php

$html = '
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <title>iPet</title>
            <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
            <style>
            .button_email {
                background: #686667;
                color: #FFF;
                padding: 13px;
                border-radius: 21px;
                margin-bottom: 24px;
                cursor: pointer;
            }
            
            .div_main {
                background-color: #ffffff;
                padding-top: 2px;
                padding-bottom: 2px;
                text-align: center;
            }
            
            .div_sec {
                font-family: Arial;
                margin: auto;
                width: 100%;
                border-bottom: 0;
                background-color: #fff;
            }
            
            .div_img {
                text-align: left;
                padding: 12px;
            }
            
            .titulo {
                padding: 5px 20px 5px 20px;
                width: 80%;
                margin: auto;
                border: 0px solid #FFFFFF;
                border-top: 0;
                border-bottom: 0;
                background-color: #fff;
                color: #686667;
                font-size: 20px;
            }
            
            .titulo>p {
                margin: 5px 0px 5px 0px;
            }
            
            .div_footer {
                width: 100%;
                margin: auto;
                text-align: center;
                border: 0px solid #dfdfdf;
                border-top: 0;
            }
            
            .div2_footer {
                width: 100%;
                padding-top: 3px;
                padding-bottom: 3px;
                color: #7d7d7d;
                background-color: #686667;
                background-position: bottom -104px right 0px !important;
                height: 67px;
                background-size: cover;
            }
            
            .div2_footer>p:first-child {
                margin-top: 5px;
                margin-bottom: 5px;
                color: #FFFFFF;
                font-size: 13px;
                margin-left: 10px;
                margin-right: 10px;
            }
            
            .div2_footer>p:nth-child(2) {
                margin-top: 5px;
                margin-bottom: 5px;
                color: #FFFFFF;
                font-size: 11px;
                margin-left: 10px;
                margin-right: 10px;
            }
            
            .div3_footer {
                text-align: center;
            }
            
            .div3_footer_span {
                color: #ddd;
                letter-spacing: -1px;
                margin-right: 6px;
            }
            
            .div3_footer>p {
                font-size: 17px;
            }
            
            h4 {
                margin-bottom: 3px;
                margin-top: 0px;
            }
            
            table {
                /* border-collapse: collapse; */
                margin: 0;
                padding: 0;
                width: 100%;
                table-layout: fixed;
            }
            
            table caption {
                font-size: 1.5em;
                margin: .5em 0 .75em;
            }
            
            table td {
                padding: .625em;
            }
            
            table tr {
                display: block;
            }
            
            @media screen and (max-width: 800px) {
                table {
                    border: 0;
                }
                .value_center {
                    text-align: center !important;
                    margin: 5px !important;
                    padding: 1px !important;
                }
                table caption {
                    font-size: 1.3em;
                }
                table tr {
                    display: block;
                    margin-bottom: .625em;
                }
                table td {
                    display: block;
                    font-size: 0.9em;
                    text-align: left;
                }
                table td::before {
                    content: attr(data-label);
                    float: left;
                    font-weight: bold;
                    text-transform: uppercase;
                }
                table td:last-child {
                    border-bottom: 0;
                }
            }
            </style>
        </head>
        <body>
            <div class="div_main">
                <div class="div_sec">
                    <div class="div_img" style="background-color:#FFF;"> <img loading="lazy" class="alignnone size-full wp-image-71" alt="" width="70" height="70" src="data:image/png;base64,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" /> </div>
                    <div class="titulo" style="padding-top: 30px;padding-bottom: 5px;">
                        <p> <b>Olá, '.$nome.'</b> </p>
                        <p> <b>SOLICITAÇÃO DE ALTERAÇÃO DE SENHA</b> </p>
                    </div>
                    <div style="padding-top: 0px;padding-bottom: 0px;text-align: left;padding-left: 20px;padding: 20px;color: #686667;">
                        <p style="text-align:center; color:red; font-size:18px;">Se não foi você que realizou essa solicitação, por favor ignore este e-mail.</p>
                    </div>
                    <form action="'.$pathAdmin .'retrieve.php?email=\''.$email_cliente.'\'&k=\''.$key.'\'" method="POST">
                        <button style="cursor:pointer" class="button_email" type="submit">Alterar Senha</button>
                    </form>
                    <div class="div_footer">
                        <div class="div2_footer" style="margin-top:5px;">
                            <div style="padding-top: 21px;">
                                <p style="color: #ffffff;font-size: 12px;margin-top: 0px;margin-bottom: 0px;">iPet Ltda
                                    <p style="color: #ffffff;font-size: 12px;margin-top: 0px;margin-bottom: 0px;">2022 © Copyright iPet
                                        <br /> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </body>
    </html> ';

