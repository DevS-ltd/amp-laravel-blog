<style>
  .posts__wrapper {
    padding-top: 15px;
  }

  .post-element__wrapper {
    padding: 0 15px;
  }

  amp-img.amp-carousel-slide>img.i-amphtml-replaced-content {
    object-fit: cover;
    cursor: pointer;
  }

  amp-img.amp-carousel-slide>img.i-amphtml-replaced-content:hover {
    opacity: 0.9;
  }

  .post-element__title {
    padding: 20px 0 10px;
    margin: 0;
  }

  .post-element__title-link {
    color: #444;
    text-decoration: none;
  }

  .post-element__description {
    font-size: 11px;
    color: #62707c;
    letter-spacing: 1px;
  }

  .post-element__description-link {
    font-weight: 600;
  }

  .post-element__description-link:hover,
  .post-element__title-link:hover {
    text-decoration: underline;
  }

  @media screen and (max-width: 677px) {
    .post-element__wrapper ~ .post-element__wrapper {
      margin-top: 30px;
      border-top: 1px solid #eee;
      padding-top: 30px;
    }
  }

  @media screen and (min-width: 678px) {
    .posts__wrapper {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
    }
    .post-element__wrapper {
      width: 50%;
      box-sizing: border-box;
      padding-bottom: 30px;
    }
  }

  @media screen and (min-width: 992px) {
    .posts__wrapper {
      padding: 45px 0 15px;
    }
    .post-element__wrapper {
      width: 33%;
    }
  }
</style>