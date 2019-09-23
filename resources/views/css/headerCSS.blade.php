<style amp-custom="">
  .header__wrapper {
    display: flex;
    height: 56px;
  }

  .burger__button {
    line-height: 3.5rem;
    font-size: 2rem;
    cursor: pointer;
    text-decoration: none;
  }

  .logo__wrapper {
    min-width: 210px;
  }

  .brand__link {
    text-decoration: none;
    font-family: "Lilita One";
    font-size: 20px;
  }

  .header-sidebar {
    width: 100%;
    flex-direction: row;
    display: flex;
    justify-content: flex-end;
  }

  .search-form {
    margin-bottom: 15px;
  }

  .search__input, .search__button {
    border-radius: 0;
  }

  .navbar__wrapper {
    list-style: none;
    padding: 0;
    margin: 0 0 15px;
  }

  .navbar__link {
    text-decoration: none;
    padding: 5px 0;
    color: #2c333a;
  }

  .sidebar-profile__data {
    border: none;
    background: transparent;
    padding: 0;
    color: #2c333a;
    line-height: 3.5rem;
  }

  .avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #bbbbbb;
    line-height: 40px;
    text-align: center;
    text-transform: uppercase;
  }

  .dropdown-item {
    text-decoration: none;
    padding: 5px 15px;
    color: #2c333a;
    display: block;
  }

  .social__wrapper {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .social__link {
    fill: #2c333a;
  }

  @media screen and (max-width: 991px) {
    .header-sidebar {
      display: none;
    }

    .sidebar-profile__wrapper {
      width: 100%;
    }

    .avatar {
      margin-right: 15px;
    }

    .logo__wrapper {
      width: 100%;
      padding-right: 29px;
    }
  }

  @media screen and (min-width: 992px) {
    .header__wrapper {
      justify-content: space-between;
    }

    .burger__button {
      display: none;
    }

    .navbar__wrapper {
      display: flex;
      margin: 0;
    }

    .navbar__element {
      height: 100%;
    }

    .navbar__link {
      color: #ffffff;
      height: 100%;
      align-items: center;
      padding: 0 10px;
    }

    .social__link {
      height: 100%;
      align-items: center;
      padding: 0 10px;
      fill: #ffffff;
    }

    .search-form {
      margin: 0;
      align-items: center;
    }

    .search__submit {
      background: #20252a;
    }

    .search__submit:hover {
      background: #000000;
    }

    .sidebar-profile__wrapper {
      width: 75px;
    }

    .username {
      display: none;
    }

    .avatar {
      justify-content: center;
      margin: 8px auto;
    }

    .dropdown-item {
      padding: 5px 0;
      text-align: center;
    }

    .i-amphtml-accordion-content {
      z-index: 10;
    }
  }
</style>