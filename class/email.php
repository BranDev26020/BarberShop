<?php

namespace Clases;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email
{

  public $email;
  public $nombre;
  public $token;
  public $id;

  public function __construct($nombre, $email, $token, $id)
  {
    $this->email = $email;
    $this->nombre = $nombre;
    $this->token = $token;
    $this->id = $id;
  }

  public function enviarEmail()
  {

    $mail = new PHPMailer(true);

    //configurar smtp
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'RoyalCutBarber10@gmail.com';
    $mail->Password = 'qimdvytdkuwqxwdo';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    //configurar el contenido del email
    $mail->setFrom("RoyalCutBarber10@gmail.com");
    $mail->AddAddress($this->email);
    $mail->Subject = "You have a New Message";

    //habilitar el html
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';

    $contenido = '
        <html >
  <head>
  <style>
      table {
        
        margin: auto;
      }

      @media (min-width: 768px) {
        table {
          padding: 0rem;
          max-width: 90%;
        }
      }
      thead {
        font-size: 1.5rem;
        border-bottom: 2px solid #000;
        padding: 0.5rem 0;
        display: flex;
        justify-content: center;
      }
    
      h2 {
        width: 4rem;
        font-size: 1.1rem;
        display: block;
        padding: 0.8rem 3rem;
        font-weight: 700;
        background-color: #24619e;
        border-radius: 0.5rem;
        color: #fff;
      }
      tr{
        margin: 1rem 0;
      }

      img {
        width: 11rem;
      }

      a{
        background-color:#144270 ;
        padding: 1rem 1.5rem;
        border-radius: .5rem;
        text-decoration: none;
        margin:2rem 0;
        display: block;
        text-align: center;
      }
      b{
        color: #fff;
      }
    </style>
  </head>
  <body>
    <table>
    
 
      <thead><td>Royal Cut</td></thead>
      
          <tr>
          <td>Hello ' . $this->nombre . '</td>
          </tr>

          <tbody>
          <tr>
          <td>     
          Thank you for registering with our service. To complete your
          registration, please verify your email address by clicking the
          following link or copying and pasting the following code on our
          website:
          </td>
          </tr>

          <tr>
          <td> <h2> ' . $this->token . '</h2></td>
          </tr>

          </tbody>
         
          <tr>
          <td>If you encounter any problems or require assistance, please contact us.</td>
          </tr>

          <tr>
          <td>
          <a href="http://localhost:3000/confirm_account?token=' . $this->token . '&id='.$this->id .'"><b>Click here to activate your account.</b></a>
          </td>
          </tr>


     <tfoot>
        <tr>
        <td> Thank you, <span><strong> BarberShop royal cut.</strong></span></td>
       </tr>
       </tfoot>
     
     
   

    </table>
  </body>
  </html>

        ';


    $mail->Body = $contenido;
    $mail->send();
  }




  public function recuperarEmail()
  {
    $mail = new PHPMailer(true);

    //configurar smtp
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'RoyalCutBarber10@gmail.com';
    $mail->Password = 'qimdvytdkuwqxwdo';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    //configurar el contenido del email
    $mail->setFrom("RoyalCutBarber10@gmail.com");
    $mail->AddAddress($this->email);
    $mail->Subject = "You have a New Message";

    //habilitar el html
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';

    $contenido = '
        <html >
  <head>
    <style>
      table {
        
        margin: auto;
      }

      @media (min-width: 768px) {
        table {
          padding: 0rem;
          max-width: 90%;
        }
      }
      thead {
        font-size: 1.5rem;
        border-bottom: 2px solid #000;
        padding: 0.5rem 0;
        display: flex;
        justify-content: center;
      }
    
      h2 {
        width: 4rem;
        font-size: 1.1rem;
        display: block;
        padding: 0.8rem 3rem;
        font-weight: 700;
        background-color: #24619e;
        border-radius: 0.5rem;
        color: #fff;
      }
      tr{
        margin: 1rem 0;
      }

      img {
        width: 11rem;
      }

      a{
        background-color:#144270 ;
        padding: 1rem 1.5rem;
        border-radius: .5rem;
        text-decoration: none;
        margin:2rem 0;
        display: block;
        text-align: center;
      }
      b{
        color: #fff;
      }
    </style>
  </head>
  <body>
    <table>
    
 
      <thead>Royal Cut</thead>
      
          <tr>
          <td>Dear user,</td>
          </tr>

          <tr>
          <td>  We have received a request to recover your account. To continue the process, we have sent a verification token to your email address. Please check your 
          inbox and follow the instructions to reset your account.</td>
        
          </tr>

          <tr>
          <td> <h2> ' . $this->token . '</h2></td>
          </tr>

          <tr>
          <td>  If you have not requested an account recovery, please ignore this message and your account will remain secure.</td>
          </tr>

          <tr>
          <td>
          <a href="http://localhost:3000/recover_password?token=' . $this->token . '"><b>Click here to reset your password..</b></a>
          </td>
          </tr>
         
        <tfoot>
        <tr>
        <td> Thank you, <span><strong> BarberShop royal cut.</strong></span></td>
       </tr>
       </tfoot>
     
   

    </table>
  </body>
  </html>

        ';


    $mail->Body = $contenido;
    $mail->send();
  }
}
