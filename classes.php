<!DOCTYPE html>
<html>
<head>
  <title></title>


<style>
<!--  Author Name: Nikhil Bhalerao - www.nikhilbhalerao.com 
PHP, Laravel and Codeignitor Developer -->
.button {
  margin-bottom: 4px;
  padding: 8px 12px;
  border: 1px solid #75B9E1;
  border-radius: 3px;
  background: #4FA0D0;
  cursor: pointer;
  font-family: inherit;
  text-transform: uppercase;
  color: #fff;
}
.button:focus {
  outline: none;
}
.button--warning {
  border: 1px solid #FFB039;
  background: #ff9800;
}
.button--success {
  border: 1px solid #71E6AB;
  background: #4AD890;
}
.button--error {
  border: 1px solid #F578A4;
  background: #EF5289;
}

/**
 * Popups.
 */
.popup {
  visibility: hidden;
  transition: visibility 0ms linear 0.3s;
}
.popup--visible {
  visibility: visible;
  transition: visibility 0ms;
}
.popup__background {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 10000;
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, 0.4);
  opacity: 0;
  transition: opacity 0.3s ease-in-out;
}
.popup--visible .popup__background {
  opacity: 1;
}
.popup__content {
  position: fixed;
  top: 50%;
  left: 50%;
  z-index: 10001;
  min-width: 400px;
  padding: 25px 50px;
  background: #fff;
  border: 1px solid #ddd;
  border-radius: 3px;
  text-align: center;
  -webkit-animation: hide-popup 0.3s forwards;
          animation: hide-popup 0.3s forwards;
  /**
   * Popup types.
   */
}
.popup--visible .popup__content {
  -webkit-animation: show-popup 0.3s forwards;
          animation: show-popup 0.3s forwards;
}
.popup--icon .popup__content {
  padding-top: 130px;
  /**
   * Animations on opened popups.
   *
   * We need to prepend ".popup--visible" with no space to "&" to match the
   * an opened popup: ".popup--visible.popup--icon".
   *
   * Therefore we need the "at-root" function to break out of nesting as well as the
   * "selector-append" function to append parent selectors without space.
   *
   * Details:
   *  - https://css-tricks.com/the-sass-ampersand/
   *  - http://sass-lang.com/documentation/Sass/Script/Functions.html#selector_append-instance_method
   */
  /**
   * Different popup icon styles
   *
   * E.g. selector for type question: ".popup--icon.-question" to match class="popup--icon -question"
   *
   * To have an easier selector in SCSS we use a little workaround and rearrange the selectors:
   *  ".-question.popup--icon" is also matching class="popup--icon -question"
   */
}
.popup--icon .popup__content:before, .popup--icon .popup__content:after {
  position: absolute;
  top: 25px;
  left: 50%;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
  display: block;
  height: 90px;
  width: 90px;
}
.popup--icon .popup__content:before {
  content: '';
  border: 3px solid currentColor;
  border-radius: 50%;
  -webkit-transform: translateX(-50%) scale(1, 0);
          transform: translateX(-50%) scale(1, 0);
  opacity: 0;
}
.popup--icon .popup__content:after {
  content: '\2713';
  line-height: 90px;
  font-size: 45px;
  -webkit-transform: translateX(-50%) scale(0);
          transform: translateX(-50%) scale(0);
  opacity: 0;
}
.popup--visible.popup--icon .popup__content:before {
  -webkit-animation: show-icon-cirlce 0.3s forwards 0.15s;
          animation: show-icon-cirlce 0.3s forwards 0.15s;
}
.popup--visible.popup--icon .popup__content:after {
  -webkit-animation: show-icon 0.3s forwards 0.3s;
          animation: show-icon 0.3s forwards 0.3s;
}
.-question.popup--icon .popup__content:before {
  border-color: #ff9800;
}
.-question.popup--icon .popup__content:after {
  content: '?';
  color: #ff9800;
}
.-success.popup--icon .popup__content:before {
  border-color: #4AD890;
}
.-success.popup--icon .popup__content:after {
  content: '\2713';
  color: #4AD890;
}
.-error.popup--icon .popup__content:before {
  border-color: #EF5289;
}
.-error.popup--icon .popup__content:after {
  content: '\2717';
  color: #EF5289;
}
.popup__content__title {
  margin-bottom: 10px;
  font-size: 28px;
  font-weight: 100;
  color: #626262;
}

/**
 * Popup animations.
 * Based on Sweet Alert: "https://t4t5.github.io/sweetalert/"
 */
@-webkit-keyframes show-popup {
  0% {
    -webkit-transform: translate(-50%, -50%) scale(0.7);
            transform: translate(-50%, -50%) scale(0.7);
    opacity: 0;
  }
  45% {
    -webkit-transform: translate(-50%, -50%) scale(1.05);
            transform: translate(-50%, -50%) scale(1.05);
    opacity: 1;
  }
  80% {
    -webkit-transform: translate(-50%, -50%) scale(0.95);
            transform: translate(-50%, -50%) scale(0.95);
  }
  100% {
    -webkit-transform: translate(-50%, -50%) scale(1);
            transform: translate(-50%, -50%) scale(1);
  }
}
@keyframes show-popup {
  0% {
    -webkit-transform: translate(-50%, -50%) scale(0.7);
            transform: translate(-50%, -50%) scale(0.7);
    opacity: 0;
  }
  45% {
    -webkit-transform: translate(-50%, -50%) scale(1.05);
            transform: translate(-50%, -50%) scale(1.05);
    opacity: 1;
  }
  80% {
    -webkit-transform: translate(-50%, -50%) scale(0.95);
            transform: translate(-50%, -50%) scale(0.95);
  }
  100% {
    -webkit-transform: translate(-50%, -50%) scale(1);
            transform: translate(-50%, -50%) scale(1);
  }
}
@-webkit-keyframes hide-popup {
  0% {
    -webkit-transform: translate(-50%, -50%) scale(1);
            transform: translate(-50%, -50%) scale(1);
    opacity: 1;
  }
  100% {
    -webkit-transform: translate(-50%, -50%) scale(0.5);
            transform: translate(-50%, -50%) scale(0.5);
    opacity: 0;
  }
}
@keyframes hide-popup {
  0% {
    -webkit-transform: translate(-50%, -50%) scale(1);
            transform: translate(-50%, -50%) scale(1);
    opacity: 1;
  }
  100% {
    -webkit-transform: translate(-50%, -50%) scale(0.5);
            transform: translate(-50%, -50%) scale(0.5);
    opacity: 0;
  }
}
/**
 * Icon animations.
 */
@-webkit-keyframes show-icon {
  0% {
    -webkit-transform: translateX(-50%) scale(0);
            transform: translateX(-50%) scale(0);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateX(-50%) scale(1);
            transform: translateX(-50%) scale(1);
    opacity: 1;
  }
}
@keyframes show-icon {
  0% {
    -webkit-transform: translateX(-50%) scale(0);
            transform: translateX(-50%) scale(0);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateX(-50%) scale(1);
            transform: translateX(-50%) scale(1);
    opacity: 1;
  }
}
@-webkit-keyframes show-icon-cirlce {
  0% {
    -webkit-transform: translateX(-50%) scale(1, 0);
            transform: translateX(-50%) scale(1, 0);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateX(-50%) scale(1, 1);
            transform: translateX(-50%) scale(1, 1);
    opacity: 1;
  }
}
@keyframes show-icon-cirlce {
  0% {
    -webkit-transform: translateX(-50%) scale(1, 0);
            transform: translateX(-50%) scale(1, 0);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateX(-50%) scale(1, 1);
            transform: translateX(-50%) scale(1, 1);
    opacity: 1;
  }
}
?>
</style>
<!-- </body>
</html> -->