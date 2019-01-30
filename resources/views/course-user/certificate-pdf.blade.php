<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Certificate</title>


  <style rel="stylesheet">

    html {
      line-height: 1.15;
      /* 1 */
      -ms-text-size-adjust: 100%;
      /* 2 */
      -webkit-text-size-adjust: 100%;
      /* 2 */
    }


    body {
      margin: 0;
    }

    article,
    aside,
    footer,
    header,
    nav,
    section {
      display: block;
    }


    h1 {
      font-size: 2em;
      margin: 0.67em 0;
    }


    figcaption,
    figure,
    main {
      /* 1 */
      display: block;
    }



    figure {
      margin: 1em 40px;
    }



    hr {
      box-sizing: content-box;
      /* 1 */
      height: 0;
      /* 1 */
      overflow: visible;
      /* 2 */
    }



    pre {
      font-family: monospace, monospace;
      /* 1 */
      font-size: 1em;
      /* 2 */
    }



    a {
      background-color: transparent;
      /* 1 */
      -webkit-text-decoration-skip: objects;
      /* 2 */
    }



    abbr[title] {
      border-bottom: none;
      /* 1 */
      text-decoration: underline;
      /* 2 */
      text-decoration: underline dotted;
      /* 2 */
    }



    b,
    strong {
      font-weight: inherit;
    }


    b,
    strong {
      font-weight: bolder;
    }

    code,
    kbd,
    samp {
      font-family: monospace, monospace;
      /* 1 */
      font-size: 1em;
      /* 2 */
    }

    dfn {
      font-style: italic;
    }

    mark {
      background-color: #ff0;
      color: #000;
    }


    small {
      font-size: 80%;
    }

    sub,
    sup {
      font-size: 75%;
      line-height: 0;
      position: relative;
      vertical-align: baseline;
    }

    sub {
      bottom: -0.25em;
    }

    sup {
      top: -0.5em;
    }

    audio,
    video {
      display: inline-block;
    }

    audio:not([controls]) {
      display: none;
      height: 0;
    }

    img {
      border-style: none;
    }

    svg:not(:root) {
      overflow: hidden;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
      font-family: sans-serif;
      /* 1 */
      font-size: 100%;
      /* 1 */
      line-height: 1.15;
      /* 1 */
      margin: 0;
      /* 2 */
    }

    button,
    input {
      /* 1 */
      overflow: visible;
    }

    button,
    select {
      /* 1 */
      text-transform: none;
    }

    button,
    html [type="button"],
    /* 1 */

    [type="reset"],
    [type="submit"] {
      -webkit-appearance: button;
      /* 2 */
    }


    button::-moz-focus-inner,
    [type="button"]::-moz-focus-inner,
    [type="reset"]::-moz-focus-inner,
    [type="submit"]::-moz-focus-inner {
      border-style: none;
      padding: 0;
    }


    button:-moz-focusring,
    [type="button"]:-moz-focusring,
    [type="reset"]:-moz-focusring,
    [type="submit"]:-moz-focusring {
      outline: 1px dotted ButtonText;
    }

    fieldset {
      padding: 0.35em 0.75em 0.625em;
    }

    legend {
      box-sizing: border-box;
      /* 1 */
      color: inherit;
      /* 2 */
      display: table;
      /* 1 */
      max-width: 100%;
      /* 1 */
      padding: 0;
      /* 3 */
      white-space: normal;
      /* 1 */
    }

    progress {
      display: inline-block;
      /* 1 */
      vertical-align: baseline;
      /* 2 */
    }

    textarea {
      overflow: auto;
    }


    [type="checkbox"],
    [type="radio"] {
      box-sizing: border-box;
      /* 1 */
      padding: 0;
      /* 2 */
    }

    [type="number"]::-webkit-inner-spin-button,
    [type="number"]::-webkit-outer-spin-button {
      height: auto;
    }

    [type="search"] {
      -webkit-appearance: textfield;
      /* 1 */
      outline-offset: -2px;
      /* 2 */
    }


    [type="search"]::-webkit-search-cancel-button,
    [type="search"]::-webkit-search-decoration {
      -webkit-appearance: none;
    }

    ::-webkit-file-upload-button {
      -webkit-appearance: button;
      /* 1 */
      font: inherit;
      /* 2 */
    }

    details,
    /* 1 */

    menu {
      display: block;
    }

    summary {
      display: list-item;
    }

    canvas {
      display: inline-block;
    }

    template {
      display: none;
    }

    [hidden] {
      display: none;
    }

    /*normalize end*/

    /*paper css start*/

    @page {
      margin: 0
    }

    body {
      margin: 0
    }

    .sheet {
      margin: 0;
      overflow: hidden;
      position: relative;
      box-sizing: border-box;
      page-break-after: always;
    }

    /** Paper sizes **/

    body.A3 .sheet {
      width: 297mm;
      height: 419mm
    }

    body.A3.landscape .sheet {
      width: 420mm;
      height: 296mm
    }

    body.A4 .sheet {
      width: 210mm;
      height: 296mm
    }

    body.A4.landscape .sheet {
      width: 297mm;
      height: 209mm
    }

    body.A5 .sheet {
      width: 148mm;
      height: 209mm
    }

    body.A5.landscape .sheet {
      width: 210mm;
      height: 147mm
    }

    body.letter .sheet {
      width: 216mm;
      height: 279mm
    }

    body.letter.landscape .sheet {
      width: 280mm;
      height: 215mm
    }

    body.legal .sheet {
      width: 216mm;
      height: 356mm
    }

    body.legal.landscape .sheet {
      width: 357mm;
      height: 215mm
    }

    /** Padding area **/

    .sheet.padding-10mm {
      padding: 10mm
    }

    .sheet.padding-15mm {
      padding: 15mm
    }

    .sheet.padding-20mm {
      padding: 20mm
    }

    .sheet.padding-25mm {
      padding: 25mm
    }

    /** For screen preview **/

    @mediascreen {
      body {
        background: #e0e0e0
      }
      .sheet {
        background: white;
        box-shadow: 0 .5mm 2mm rgba(0, 0, 0, .3);
        margin: 5mm auto;
      }
    }

    /** Fix for Chrome issue #273306 **/

    @mediaprint {
      body.A3.landscape {
        width: 420mm
      }
      body.A3,
      body.A4.landscape {
        width: 297mm
      }
      body.A4,
      body.A5.landscape {
        width: 210mm
      }
      body.A5 {
        width: 148mm
      }
      body.letter,
      body.legal {
        width: 216mm
      }
      body.letter.landscape {
        width: 280mm
      }
      body.legal.landscape {
        width: 357mm
      }
    }

    /*paper css end*/

    /*style css start*/

    .certificate {
      background-image: url({{base_path('public/img/background.png') }});
    background-size: cover;
    background-position: center;
    -webkit-print-color-adjust: exact;
    text-align: center;
    }

    .title {
      font-size: 36px;
      color: #bf1e2e;
      text-align: center;
      margin-top: 85px;
    }

    .text {
      font-size: 22px;
      font-weight: normal;
      font-family: 'Open Sans', sans-serif;
      color: #2c3e50;
      text-align: center;
    }

    .participant-name {
      font-size: 40px;
      font-weight: bold;
      font-family: 'Alex Brush', cursive;
      color: #2C3A47;
      text-align: center;
      border-bottom: 1px solid #ddd;
      width: 72%;
      margin: 0 auto;
    }

    .course-name {
      font-size: 38px;
      font-family: 'Abel', sans-serif;
      color: #bf1e2e;
      text-align: center;
      font-weight: normal;
    }

    .divider {
      width: 30%;
      height: auto;
    }

    .long-text {
      width: 80%;
      font-size: 19px;
      font-weight: normal;
      font-family: 'Open Sans', sans-serif;
      color: #2c3e50;
      text-align: center;
      margin-left: auto;
      margin-right: auto;
      line-height: normal;
    }

    .seal {
      width: 110px;
      height: auto;
      position: absolute;
      float: left;
      margin-left: 80px;
      top: 68%;
      left: 10%;
    }

    /*style css end*/
  </style>
</head>

<body style="width: 216mm; height: 279mm">
  <section class="certificate" style="padding: 10mm">
    <h1 style="font-family: sunflower;" class="title">
        CERTIFICATE OF COMPLETION
      </h1>
    <h4 class="text">This is to certify that</h4>
    <h2 style="font-family: alexbrush;" class="participant-name">{{ auth()->user()->name}}</h2>
    <h4 class="text">has successfully completed the training course of</h4>
    <h1 style="font-family: sans-serif;" class="course-name">{{ $course }}</h1>
    <img class="divider" alt="divider img" src="{{public_path('img/divider.png')}}">
    <h4 class="long-text">We found him sincere, hardworking, dedicated and result oriented. He completed all the requirement for the course.</h4>
    <img class="seal" alt="Seal logo" src="{{public_path('img/seal.png')}}" style="margin-top:-5px">
    <div class="signature-container">
      <div>
        <div style="clear: both; margin: 0pt; padding: 0pt; "></div>
        <div style="float: right; width: 50%;">
          <img style="width: 150px; height: auto;" src="{{ public_path('thumbnail/'.$signer_sign1) }}" alt="signature"><br>
          <span>{{ $signer_name1 }} <br></span>
          <span>{{ $signer_position1 }}</span>
        </div>
        <div style="float: left; width: 50%;">
          <img style="width: 150px; height: auto;" src="{{ public_path('thumbnail/'.$signer_sign2) }}" alt="signature"><br>
          <span>{{ $signer_name2 }} <br></span>
          <span>{{ $signer_position2 }}</span>
        </div>
        <div style="clear: both; margin: 0pt; padding: 0pt; "></div>
      </div>
    </div>
  </section>
</body>

</html>
