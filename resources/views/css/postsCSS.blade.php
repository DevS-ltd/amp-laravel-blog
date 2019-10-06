<style>
  .posts-wrapper {
    padding-top: 15px;
  }

  .post-wrapper {
    padding: 0 15px;
  }

  amp-img.amp-carousel-slide>img.i-amphtml-replaced-content {
    object-fit: cover;
    cursor: pointer;
  }

  amp-img.amp-carousel-slide>img.i-amphtml-replaced-content:hover {
    opacity: 0.9;
  }

  .post-title {
    padding: 20px 0 10px;
    margin: 0;
  }

  .post-title-link {
    color: #444;
    text-decoration: none;
  }

  .post-description {
    font-size: 11px;
    color: #62707c;
    letter-spacing: 1px;
  }

  .post-description-link {
    font-weight: 600;
  }

  .post-description-link:hover,
  .post-title-link:hover {
    text-decoration: underline;
  }

  .widget {
    padding: 20px 15px 45px;
    text-align: center;
    width: 100%;
    box-sizing: border-box;
  }

  .subscribe-widget {
    background: #2C333A;
    padding: 20px 30px 20px;
    color: #eee;
  }

  .widget-header {
    font-size: 14px;
    padding: 5px 0 5px 0;
    text-transform: uppercase;
    font-weight: 600;
    margin: 0 0 7px;
  }

  .widget-description {
    font-size: 14px;
    line-height: 20px;
    color: #eee;
    letter-spacing: 0.5px;
    margin: 0 0 15px;
  }

  .widget-input {
    background: #fdfdfd;
    border: 1px solid #eee;
    color: #666;
    font-size: 12px;
    margin: 0 0 10px;
    text-align: center;
    outline: none;
    padding: 0 10px;
    width: 100%;
    height: 34px;
    font-weight: 400;
    box-sizing: border-box;
  }

  .widget-button {
    letter-spacing: 0.5px;
    background: #f68320;
    border: none;
    color: #fff;
    font-size: 12px;
    font-weight: 600;
    padding: 7px 25px;
    -webkit-appearance: none;
    text-transform: uppercase;
    margin: 0;
    width: 100%;
    height: 34px;
    box-sizing: border-box;
  }

  .post-title {
    padding: 0 0 20px;
    margin: 0;
  }

  .post-image-wrapper {
    padding: 0 0 20px;
  }

  .post {
    box-sizing: border-box;
    padding: 0 15px;
    width: 100%;
    position: relative;
  }

  .post-content {
    margin-top: 30px;
    padding-top: 30px;
    border-top: 2px solid #f8f8f8;
    font-size: 16px;
    letter-spacing: 0.5px;
  }

  .post-content p {
    margin: 0 0 10px;
  }

  .post-categories {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 1;
    display: flex;
    flex-wrap: wrap;
    margin: 0 -4px;
  }

  .post-categories-link {
    font-size: 11px;
    vertical-align: middle;
    color: #fff;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    font-weight: 600;
    background: #20252A;
    padding: 5px 10px;
    margin: 0 2px 4px;
  }

  .post-categories-link:hover {
    background: #f68320;
  }

  @media screen and (max-width: 677px) {
    .post-wrapper ~ .post-wrapper {
      margin-top: 30px;
      border-top: 1px solid #eee;
      padding-top: 30px;
    }
  }

  @media screen and (min-width: 678px) {
    .posts-wrapper {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
    }
    .post-wrapper {
      width: 50%;
      box-sizing: border-box;
      padding-bottom: 30px;
    }
  }

  @media screen and (min-width: 768px) {
    .post-content-wrapper {
      padding: 0 30px 30px
    }
  }

  @media screen and (min-width: 992px) {
    .posts-wrapper {
      padding: 45px 0 15px;
    }
    .post-wrapper {
      width: 33%;
    }

    .widget {
      width: 25%;
    }

    .post {
      width: 75%;
    }
  }
</style>