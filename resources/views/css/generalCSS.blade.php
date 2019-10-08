<style amp-custom="">
  html {
    font-family: 'Nunito', sans-serif;
  }

  body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 100vh;
    background: #f8f8f8;
    color: #444;
  }

  #app {
    flex-grow: 1;
  }

  a {
    color: #f68320;
    text-decoration: none;
  }

  .container {
    max-width: 1300px;
    margin: 0 auto;
    padding: 0 15px;
    display: block;
    position: relative;;
  }

  .row {
    margin: 0 -15px;
  }

  .flex {
    display: flex;
  }

  .direction__column {
    flex-direction: column;
  }

  .justify__start {
    justify-content: start;
  }

  .justify__end {
    justify-content: flex-end;;
  }

  .justify__evenly {
    justify-content: space-evenly;
  }

  .align__center {
    align-items: center;
  }

  .content__center {
    justify-content: center;
    align-items: center
  }


  .color__white {
    color: #ffffff;
  }

  .color__grey {
    color: #7c8a96;
  }

  .color__black {
    color: #2c333a;
  }


  .bg__white {
    background: #ffffff;
  }

  .bg__black {
    background: #2c333a;
  }


  .form__group {
    margin-bottom: 15px;
  }

  .form__group.is-invalid label {
    color: #dc3232;
  }

  .form__group.is-invalid .form__control {
    border-color: #dc3232;
  }

  .form__group.is-invalid .form__control:focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(220,53,69,.25);
  }

  .form__group.is-invalid .invalid-feedback {
    font-size: 13px;
    color: #dc3232;
  }

  .form__group label {
    color: #2c333a;
  }

  .form__control {
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-appearance: none;
    padding: 12px 10px;
    width: 100%;
    height: 34px;
    border: 1px solid #2c333a;
    letter-spacing: 0.5px;
    font-size: 12px;
    background: #ffffff;
    color: #7c8a96;
    border-radius: 3px;
  }

  .btn {
    font-size: 12px;
    font-weight: 600;
    padding: 7px 12px;
    text-transform: uppercase;
    cursor: pointer;
    border-radius: 3px;
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    line-height: 1.5;
  }

  .btn__primary {
    background: #20252a;
    color: #ffffff;
  }

  .btn__link {
    color: #20252a;
  }

  .btn__primary:hover {
    background: #000000;
  }

  .alert {
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
  }

  .alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
  }

  .alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
  }

  .pagination {
    display: flex;
    width: 100%;
    justify-content: center;
    list-style: none;
    padding: 0;
  }

  .pagination li ~ li {
    margin-left: 5px;
  }

  .pagination-active,
  .pagination-disabled,
  .pagination-link {
    display: flex;
    width: 30px;
    height: 30px;
    justify-content: center;
    align-items: center;
  }

  .pagination-link,
  .pagination-disabled {
    background: #111;
    color: #fff;
  }

  .pagination-link:hover,
  .pagination-disabled:hover,
  .pagination-active {
    background: #f68320;
    color: #fff;
  }
</style>