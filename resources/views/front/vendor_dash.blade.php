@extends('front.layouts.layout') @section('content')

<style>
	/* Sidebar */
.sidebar {
  min-height: calc(100vh - 60px);
  background: #fff;
  font-family: "Nunito", sans-serif;
  font-weight: 500;
  padding: 0;
  width: 235px;
  z-index: 11;
  transition: width 0.25s ease, background 0.25s ease;
  -webkit-transition: width 0.25s ease, background 0.25s ease;
  -moz-transition: width 0.25s ease, background 0.25s ease;
  -ms-transition: width 0.25s ease, background 0.25s ease;
}

.sidebar .nav {
  overflow: hidden;
  flex-wrap: nowrap;
  flex-direction: column;
  margin-bottom: 60px;
}

.sidebar .nav .nav-item {
  transition-duration: 0.25s;
  transition-property: background;
  -webkit-transition-property: background;
}

.sidebar .nav .nav-item .collapse {
  z-index: 999;
}

.sidebar .nav .nav-item .nav-link {
  display: -webkit-flex;
    display: flex;
    -webkit-align-items: center;
    align-items: center;
    white-space: nowrap;
    padding: 0.8125rem 1.937rem 0.8125rem 1rem;
    color: #6C7383;
    border-radius: 8px;
    -webkit-transition-duration: 0.45s;
    -moz-transition-duration: 0.45s;
    -o-transition-duration: 0.45s;
    transition-duration: 0.45s;
    transition-property: color;
    -webkit-transition-property: color;
}

.sidebar .nav .nav-item .nav-link i {
  color: inherit;
}

.sidebar .nav .nav-item .nav-link i.menu-icon {
  font-size: 1rem;
  line-height: 1;
  margin-right: 1rem;
  color: #6C7383;
}

.sidebar .nav .nav-item .nav-link i.menu-icon .rtl {
  margin-left: 2rem;
  margin-right: 0;
}

.sidebar .nav .nav-item .nav-link i.menu-icon {
  color: #6C7383;
}

.sidebar .nav .nav-item .nav-link i.menu-icon:before {
  vertical-align: middle;
}

.sidebar .nav .nav-item .nav-link i.menu-arrow {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  margin-left: auto;
  margin-right: 0;
  color: var(--sidebar-light-menu-arrow-color);
}

.sidebar .nav .nav-item .nav-link i.menu-arrow .rtl {
  margin-left: 0;
  margin-right: auto;
}

.sidebar .nav .nav-item .nav-link i.menu-arrow:before {
  content: "\e649";
  font-family: "themify";
  font-style: normal;
  display: block;
  font-size: 0.687rem;
  line-height: 10px;
  transition: all 0.2s ease-in;
}

.sidebar .nav .nav-item .nav-link .menu-title {
  color: inherit;
  display: inline-block;
  font-size: 0.875rem;
  line-height: 1;
  vertical-align: middle;
}

.sidebar .nav .nav-item .nav-link .badge {
  margin-left: auto;
}

.sidebar .nav .nav-item[aria-expanded="true"] .nav-link i.menu-arrow:before {
  transform: rotate(90deg);
}

.sidebar .nav .nav-item.active > .nav-link {
  background: #4B49AC;
  position: relative;
}

.sidebar .nav .nav-item.active > .nav-link i,
.sidebar .nav .nav-item.active > .nav-link .menu-title,
.sidebar .nav .nav-item.active > .nav-link .menu-arrow {
  color: #fff;
}

.sidebar .nav .nav-item.active > .nav-link i.menu-arrow:before {
  content: "\e64b";
}

.sidebar .nav .nav-item:hover > .nav-link i,
.sidebar .nav .nav-item:hover > .nav-link .menu-title,
.sidebar .nav .nav-item:hover > .nav-link .menu-arrow {
  color: var(--sidebar-light-menu-active-color);
}

.sidebar .nav:not(.sub-menu) {
  margin-top: 1.45rem;
  margin-left: 1rem;
  margin-right: 1rem;
}

.sidebar .nav:not(.sub-menu) > .nav-item {
  margin-top: 0.2rem;
}

.sidebar .nav:not(.sub-menu) > .nav-item:hover > .nav-link,
.sidebar .nav:not(.sub-menu) > .nav-item[aria-expanded="true"] > .nav-link {
  background: #4B49AC;
  color: #fff;
}

.sidebar .nav:not(.sub-menu) > .nav-item > .nav-link[aria-expanded="true"] {
      border-radius: 8px 8px 0 0;
    background: #4B49AC;
    color: #fff;
}

.sidebar .nav:not(.sub-menu) > .nav-item.active {
  background: #4B49AC;
}

.sidebar .nav .nav-item.active {
    border-radius: 8px;
}

.sidebar .nav .sub-menu {
  margin-bottom: 0;
  margin-top: 0;
  list-style: none;
  padding: 0.25rem 0 0 3.07rem !important;
  background: #4B49AC !important;
  padding-bottom: 12px;
}

.sidebar .nav .nav-item .nav-link[aria-expanded=true] i.menu-arrow:before {
    -moz-transform: rotate(90deg);
    -o-transform: rotate(90deg);
    -ms-transform: rotate(90deg);
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
}

.sidebar .nav .sub-menu .nav-item {
  position: relative;
  padding: 0;
}

.sidebar .nav .sub-menu .nav-item::before {
  content: '';
  width: 5px;
  height: 5px;
  position: absolute;
  margin-top: 16px;
  border-radius: 50%;
  background: #b2b2b2;
}

.sidebar .nav .sub-menu .nav-item .nav-link {
      color: #b9b8ee;
    padding: 0.7rem 1rem;
    position: relative;
    font-size: 0.875rem;
    line-height: 1;
    height: auto;
    border-top: 0;
    font-weight: 400;
}

.sidebar .nav .sub-menu .nav-item .nav-link:hover {
  color: var(--sidebar-light-submenu-hover-color);
}

.sidebar .nav .sub-menu .nav-item .nav-link.active {
  color: var(--sidebar-light-submenu-active-color);
  font-weight: 900;
  background: transparent;
}

.sidebar .nav .sub-menu .nav-item:hover {
  background: transparent;
}

/* Sidebar color variation */
.sidebar-dark .sidebar {
  background: var(--sidebar-dark-bg);
}

.sidebar-dark .sidebar .nav .nav-item .nav-link {
  color: var(--sidebar-dark-menu-color);
}

.sidebar-dark .sidebar .nav .nav-item .nav-link i {
  color: inherit;
}

.sidebar-dark .sidebar .nav .nav-item .nav-link i.menu-icon {
  color: var(--sidebar-dark-menu-icon-color);
}

.sidebar-dark .sidebar .nav .nav-item .nav-link .menu-title {
  color: inherit;
}

.sidebar-dark .sidebar .nav .nav-item[aria-expanded="true"] .nav-link .menu-title {
  color: var(--sidebar-dark-submenu-color);
}

.sidebar-dark .sidebar .nav .nav-item.active > .nav-link {
  background: var(--sidebar-dark-menu-active-bg);
}

.sidebar-dark .sidebar .nav .nav-item.active > .nav-link .menu-title,
.sidebar-dark .sidebar .nav .nav-item.active > .nav-link i {
  color: var(--sidebar-dark-menu-active-color);
}

.sidebar-dark .sidebar .nav .nav-item:hover > .nav-link {
  background: var(--sidebar-dark-menu-hover-bg);
  color: var(--sidebar-dark-menu-hover-color);
}

.sidebar-dark .sidebar .nav .nav-item > .nav-link[aria-expanded="true"] {
  background: #1a1f26;
}

.sidebar-dark .sidebar .nav .sub-menu {
  background: #1a1f26;
}

.sidebar-dark .sidebar .nav .sub-menu .nav-item .nav-link {
  color: var(--sidebar-dark-submenu-color);
}

.sidebar-dark .sidebar .nav .sub-menu .nav-item .nav-link::before {
  color: lighten(var(--sidebar-dark-submenu-color), 10%);
}

.sidebar-dark .sidebar .nav .sub-menu .nav-item .nav-link.active {
  color: var(--sidebar-dark-menu-active-color);
  background: transparent;
}

.sidebar-dark .sidebar .nav .sub-menu .nav-item .nav-link:hover {
  color: var(--sidebar-dark-submenu-hover-color);
}

.sidebar-dark .sidebar .nav .sub-menu .nav-item:hover {
  background: transparent;
}

/* style for off-canvas menu */
@media screen and (max-width: 991px) {
  .sidebar-offcanvas {
    position: fixed;
    max-height: calc(100vh - var(--navbar-height));
    top: var(--navbar-height);
    bottom: 0;
    overflow: auto;
    right: -var(--sidebar-width-lg);
    -webkit-transition: all 0.25s ease-out;
    -o-transition: all 0.25s ease-out;
    transition: all 0.25s ease-out;
  }

}


.main-panel {
    transition: width 0.25s ease, margin 0.25s ease;
    width: calc(100% - 235px);
    min-height: calc(100vh - 60px);
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: column;
    flex-direction: column;
}

.content-wrapper {
    background: #F5F7FF;
    padding: 2.375rem 2.375rem;
    width: 100%;
    -webkit-flex-grow: 1;
    flex-grow: 1;
}

.grid-margin {
    margin-bottom: 2.5rem;
}

.vendor-dasboard {
    min-height: calc(100vh - 60px);
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: row;
    flex-direction: row;
    padding-left: 0;
    padding-right: 0;
}

.card.card-tale {
    background: #7DA0FA;
    color: #ffffff;
}
.card.card-dark-blue {
    background: #4747A1;
    color: #ffffff;
}
.card.card-light-blue {
    background: #7978E9;
    color: #ffffff;
}
.card.card-light-danger {
    background: #F3797E;
    color: #ffffff;
}
.stretch-card > .card {
    width: 100%;
    min-width: 100%;
    border: none;
}

.stats_one p.fs-30 {
    font-size: 30px;
}

/* Cards */
.card {
  box-shadow: none;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  -ms-box-shadow: none;
  transition: background 0.25s ease;
  -webkit-transition: background 0.25s ease;
  -moz-transition: background 0.25s ease;
  -ms-transition: background 0.25s ease;
  border: none;
}
.card.tale-bg {
  background: #DAE7FF;
}
.card.transparent {
  background: transparent;
}
.card .card-body {
  padding: 1.25rem 1.25rem;
}
.card .card-body a {
  text-decoration: none;
}
.card .card-body + .card-body {
  padding-top: 1rem;
}
.card .card-title {
  color: #010101;
  margin-bottom: 1.2rem;
  text-transform: capitalize;
  font-size: 1.125rem;
  font-weight: 600;
      letter-spacing: 0px;
}
.card .card-subtitle {
  font-weight: 400;
  margin-top: 0.625rem;
  margin-bottom: 0.625rem;
}
.card .card-description {
  margin-bottom: 0.875rem;
  font-weight: 400;
  color: #76838f;
}
.card.card-outline-success {
  border: 1px solid #57B657;
}
.card.card-outline-primary {
  border: 1px solid #4B49AC;
}
.card.card-outline-warning {
  border: 1px solid #FFC100;
}
.card.card-outline-danger {
  border: 1px solid #FF4747;
}
.card.card-rounded {
  border-radius: 5px;
}
.card.card-faded {
  background: #b5b0b2;
  border-color: #b5b0b2;
}
.card.card-circle-progress {
  color: #ffffff;
  text-align: center;
}
.card.card-img-holder {
  position: relative;
}
.card.card-img-holder .card-img-absolute {
  position: absolute;
  top: 0;
  right: 0;
  height: 100%;
}
.card.card-weather .weather-daily .weather-day {
  opacity: 0.5;
  font-weight: 900;
}
.card.card-weather .weather-daily i {
  font-size: 20px;
}
.card.card-weather .weather-daily .weather-temp {
  margin-top: 0.5rem;
  margin-bottom: 0;
  opacity: 0.5;
  font-size: 0.75rem;
}
.card.card-tale {
  background: #7DA0FA;
  color: #ffffff;
}
.card.card-tale:hover {
  background: #96b2fb;
}
.card.card-dark-blue {
  background: #4747A1;
  color: #ffffff;
}
.card.card-dark-blue:hover {
  background: #5050b2;
}
.card.card-light-blue {
  background: #7978E9;
  color: #ffffff;
}
.card.card-light-blue:hover {
  background: #8f8eed;
}
.card.card-light-danger {
  background: #F3797E;
  color: #ffffff;
}
.card.card-light-danger:hover {
  background: #f59095;
}

.card-columns .card {
  margin-bottom: 0.75rem;
}
@media (min-width: 576px) {
  .card-columns {
    column-count: 3;
    column-gap: 1.25rem;
    orphans: 1;
    widows: 1;
  }
  .card-columns .card {
    display: inline-block;
    width: 100%;
  }
}

.card-inverse-primary {
  background: rgba(75, 73, 172, 0.2);
  border: 1px solid theme-color-level(primary, 1);
  color: theme-color-level(primary, 3);
}

.card-inverse-secondary {
  background: rgba(163, 164, 165, 0.2);
  border: 1px solid theme-color-level(secondary, 1);
  color: theme-color-level(secondary, 3);
}

.card-inverse-success {
  background: rgba(87, 182, 87, 0.2);
  border: 1px solid theme-color-level(success, 1);
  color: theme-color-level(success, 3);
}

.card-inverse-info {
  background: rgba(36, 138, 253, 0.2);
  border: 1px solid theme-color-level(info, 1);
  color: theme-color-level(info, 3);
}

.card-inverse-warning {
  background: rgba(255, 193, 0, 0.2);
  border: 1px solid theme-color-level(warning, 1);
  color: theme-color-level(warning, 3);
}

.card-inverse-danger {
  background: rgba(255, 71, 71, 0.2);
  border: 1px solid theme-color-level(danger, 1);
  color: theme-color-level(danger, 3);
}

.card-inverse-light {
  background: rgba(248, 249, 250, 0.2);
  border: 1px solid theme-color-level(light, 1);
  color: theme-color-level(light, 3);
}

.card-inverse-dark {
  background: rgba(40, 47, 58, 0.2);
  border: 1px solid theme-color-level(dark, 1);
  color: theme-color-level(dark, 3);
}

.data-icon-card-primary {
  background: #4B49AC;
  color: #ffffff;
}
.data-icon-card-primary .card-title {
  color: #ffffff;
}
.data-icon-card-primary .background-icon::before {
  content: url("../images/dashboard/shape-4.svg");
  position: absolute;
}
.data-icon-card-primary .background-icon i {
  z-index: 1;
  color: #ffffff;
}

.data-icon-card-secondary {
  background: #a3a4a5;
  color: #ffffff;
}
.data-icon-card-secondary .card-title {
  color: #ffffff;
}
.data-icon-card-secondary .background-icon::before {
  content: url("../images/dashboard/shape-4.svg");
  position: absolute;
}
.data-icon-card-secondary .background-icon i {
  z-index: 1;
  color: #ffffff;
}

.data-icon-card-success {
  background: #57B657;
  color: #ffffff;
}
.data-icon-card-success .card-title {
  color: #ffffff;
}
.data-icon-card-success .background-icon::before {
  content: url("../images/dashboard/shape-4.svg");
  position: absolute;
}
.data-icon-card-success .background-icon i {
  z-index: 1;
  color: #ffffff;
}

.data-icon-card-info {
  background: #248AFD;
  color: #ffffff;
}
.data-icon-card-info .card-title {
  color: #ffffff;
}
.data-icon-card-info .background-icon::before {
  content: url("../images/dashboard/shape-4.svg");
  position: absolute;
}
.data-icon-card-info .background-icon i {
  z-index: 1;
  color: #ffffff;
}

.data-icon-card-warning {
  background: #FFC100;
  color: #ffffff;
}
.data-icon-card-warning .card-title {
  color: #ffffff;
}
.data-icon-card-warning .background-icon::before {
  content: url("../images/dashboard/shape-4.svg");
  position: absolute;
}
.data-icon-card-warning .background-icon i {
  z-index: 1;
  color: #ffffff;
}

.data-icon-card-danger {
  background: #FF4747;
  color: #ffffff;
}
.data-icon-card-danger .card-title {
  color: #ffffff;
}
.data-icon-card-danger .background-icon::before {
  content: url("../images/dashboard/shape-4.svg");
  position: absolute;
}
.data-icon-card-danger .background-icon i {
  z-index: 1;
  color: #ffffff;
}

.data-icon-card-light {
  background: #f8f9fa;
  color: #ffffff;
}
.data-icon-card-light .card-title {
  color: #ffffff;
}
.data-icon-card-light .background-icon::before {
  content: url("../images/dashboard/shape-4.svg");
  position: absolute;
}
.data-icon-card-light .background-icon i {
  z-index: 1;
  color: #ffffff;
}

.data-icon-card-dark {
  background: #282f3a;
  color: #ffffff;
}
.data-icon-card-dark .card-title {
  color: #ffffff;
}
.data-icon-card-dark .background-icon::before {
  content: url("../images/dashboard/shape-4.svg");
  position: absolute;
}
.data-icon-card-dark .background-icon i {
  z-index: 1;
  color: #ffffff;
}
.font-weight-medium {
  font-weight: 600;
}

.font-weight-500 {
  font-weight: 500;
}
#sales-chart-legend ul {
  margin-bottom: 20px;
  list-style: none;
  padding-left: 0;
  display: none;
}
#sales-chart-legend ul li {
  display: -webkit-flex;
  display: flex;
  -webkit-align-items: center;
  align-items: center;
}
#sales-chart-legend ul li span {
  width: 1.562rem;
  height: 0.312rem;
  margin-right: 0.4rem;
  display: inline-block;
  font-size: 0.875rem;
  border-radius: 3px;
}
#sales-chart-legend > :first-child {
  display: flex;
    justify-content: space-between;
}
.rtl #sales-chart-legend ul {
  padding-right: 0;
}
.rtl #sales-chart-legend ul li {
  margin-right: 0;
  margin-left: 8%;
}
.rtl #sales-chart-legend ul li span {
  margin-right: 0;
  margin-left: 1rem;
}

#north-america-chart-legend ul,
#south-america-chart-legend ul {
  margin-bottom: 0;
  list-style: none;
  padding-left: 0;
  display: none;
}
#north-america-chart-legend ul li,
#south-america-chart-legend ul li {
  display: -webkit-flex;
  display: flex;
  -webkit-align-items: center;
  align-items: center;
  margin-top: 1rem;
}
#north-america-chart-legend ul li span,
#south-america-chart-legend ul li span {
  width: 20px;
  height: 20px;
  margin-right: 0.4rem;
  display: inline-block;
  font-size: 0.875rem;
  border-radius: 50%;
}
#north-america-chart-legend > :first-child,
#south-america-chart-legend > :first-child {
  display: block;
}
.rtl #north-america-chart-legend ul,
.rtl #south-america-chart-legend ul {
  padding-right: 0;
}
.rtl #north-america-chart-legend ul li,
.rtl #south-america-chart-legend ul li {
  margin-right: 0;
  margin-left: 8%;
}
.rtl #north-america-chart-legend ul li span,
.rtl #south-america-chart-legend ul li span {
  margin-right: 0;
  margin-left: 1rem;
}
.daoughnutchart-wrapper {
  height: 200px;
  text-align: center;
  display: flex;
  justify-content: center;
}

.doughnut-wrapper {
  width: 210px;
}

.doughnutjs-wrapper {
  height: 240px !important;
}
@media (max-width: 991px) {
  .doughnutjs-wrapper {
    height: auto !important;
  }
}

.stats_one p {
    font-size: 0.875rem;
    line-height: 1.3rem;
}
.stats_one p.fs-30 {
    font-size: 30px;
}
.title_came h6 {
    font-size: 0.9375rem;
}
.title_came h3 {
    font-size: 1.525rem;
}
.card .card-body p.font-weight-500 {
    font-size: 0.875rem;
    margin-bottom: 0.5rem;
    line-height: 1.3rem;
    color: #000000;
    letter-spacing: 0px;
}
.quick-tasks a.task-btn.add-product {
    border: none;
    background-color: rgb(0 178 7);
    color: #fff;
    padding: 10px 10px !important;
    border-radius: 5px;
    display: flex;
    align-items: center;
    gap: 10px;
    line-height: 18px;
    height: 40px;
}
.quick-tasks a.task-btn.respond-messages {
    border: none;
    background-color: #ff8a00;
    color: #fff;
    border-radius: 5px;
    display: flex;
    align-items: center;
    gap: 10px;
    height: 40px;
    padding: 10px 10px !important;
}
.quick-tasks {
    display: flex;
    justify-content: end;
}
.quick-tasks a.task-btn.view-analytics {
    border: none;
    background-color: black;
    color: #fff;
    padding: 10px 10px !important;
    border-radius: 5px;
    display: flex;
    align-items: center;
    gap: 10px;
    height: 40px;
}
.quick-tasks a.task-btn {
    margin-right: 7px;
	font-size: 0.9375rem;
}
.quick-tasks a.task-btn:last-child {
    margin-right: 0px;
}

</style>


<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Vendor Dashboard</h1>
        </div>
    </div>
</div>

<div class="container-fluid page-body-wrapper vendor-dasboard">
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item active">
      <a class="nav-link" href="index.html">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">UI Elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="">Buttons</a></li>
          <li class="nav-item"> <a class="nav-link" href="">Dropdowns</a></li>
          <li class="nav-item"> <a class="nav-link" href="">Typography</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Form elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="">Basic Elements</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Charts</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="icon-grid-2 menu-icon"></i>
        <span class="menu-title">Tables</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Icons</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
        <i class="icon-ban menu-icon"></i>
        <span class="menu-title">Error pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="error">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Documentation</span>
      </a>
    </li>
  </ul>
</nav>

<div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row title_came">
                  <div class="col-5 col-xl-5 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome Vendor</h3>
                    <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                  </div>
				  <div class="col-7 col-xl-7 mb-4 mb-xl-0 quick-tasks">
					<a href="#" class="task-btn add-product">
					  <i class="fas fa-plus"></i> Add Product
					</a>
					<a href="#" class="task-btn respond-messages">
					  <i class="fas fa-envelope"></i> Respond to Messages
					</a>
					<a href="#" class="task-btn view-analytics">
					  <i class="fas fa-chart-bar"></i> View Analytics
					</a>
				  </div>
                </div>
              </div>
            </div>
            <div class="row">     
              <div class="col-md-12 grid-margin transparent">
                <div class="row stats_one">
                  <div class="col-md-3 mb-0 stretch-card transparent">
                    <div class="card card-tale">
                      <div class="card-body">
                        <p class="mb-4">Today’s Bookings</p>
                        <p class="fs-30 mb-2">4006</p>
                        <p>10.00% (30 days)</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 mb-0 stretch-card transparent">
                    <div class="card card-dark-blue">
                      <div class="card-body">
                        <p class="mb-4">Total Bookings</p>
                        <p class="fs-30 mb-2">61344</p>
                        <p>22.00% (30 days)</p>
                      </div>
                    </div>
                  </div>
				  <div class="col-md-3 mb-0 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                      <div class="card-body">
                        <p class="mb-4">Number of Meetings</p>
                        <p class="fs-30 mb-2">34040</p>
                        <p>2.00% (30 days)</p>
                      </div>
                    </div>
                  </div>
				  <div class="col-md-3 stretch-card transparent">
                    <div class="card card-light-danger">
                      <div class="card-body">
                        <p class="mb-4">Number of Clients</p>
                        <p class="fs-30 mb-2">47033</p>
                        <p>0.22% (30 days)</p>
                      </div>
                    </div>
                  </div>
                </div>           
              </div>
            </div>
            <div class="row">
			  <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">Order Details</p>
                    <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                    <div class="d-flex flex-wrap mb-5">
                      <div class="me-5 mt-3">
                        <p class="text-muted">Order value</p>
                        <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
                      </div>
                      <div class="me-5 mt-3">
                        <p class="text-muted">Orders</p>
                        <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
                      </div>
                      <div class="me-5 mt-3">
                        <p class="text-muted">Users</p>
                        <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                      </div>
                      <div class="mt-3">
                        <p class="text-muted">Downloads</p>
                        <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
                      </div>
                    </div>
                    <canvas id="order-chart" width="464" height="232" style="display: block; box-sizing: border-box; height: 232px; width: 464px;"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <p class="card-title">Sales Report</p>
                      <a href="#" class="text-info">View all</a>
                    </div>
                    <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                    <div id="sales-chart-legend" class="chartjs-legend mt-4 mb-2"><ul>
                  <li>
                    <span style="background-color: #98BDFF"></span>
                    Offline Sales
                  </li>
                
                  <li>
                    <span style="background-color: #4B49AC"></span>
                    Online Sales
                  </li>
                </ul><ul>
                  <li>
                    <span style="background-color: #98BDFF"></span>
                    Offline Sales
                  </li>
                
                  <li>
                    <span style="background-color: #4B49AC"></span>
                    Online Sales
                  </li>
                </ul></div>
                    <canvas id="sales-chart" width="464" height="232" style="display: block; box-sizing: border-box; height: 232px; width: 464px;"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                  <div class="card-body">
                    <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item">
                          <div class="row">
                            <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                              <div class="ml-xl-4 mt-3">
                                <p class="card-title">Detailed Reports</p>
                                <h1 class="text-primary">$34040</h1>
                                <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                                <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                              </div>
                            </div>
                            <div class="col-md-12 col-xl-9">
                              <div class="row">
                                <div class="col-md-6 border-right">
                                  <div class="table-responsive mb-3 mb-md-0 mt-3">
                                    <table class="table table-borderless report-table">
                                      <tbody><tr>
                                        <td class="text-muted">Illinois</td>
                                        <td class="w-100 px-0">
                                          <div class="progress progress-md mx-4">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </td>
                                        <td>
                                          <h5 class="font-weight-bold mb-0">713</h5>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="text-muted">Washington</td>
                                        <td class="w-100 px-0">
                                          <div class="progress progress-md mx-4">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </td>
                                        <td>
                                          <h5 class="font-weight-bold mb-0">583</h5>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="text-muted">Mississippi</td>
                                        <td class="w-100 px-0">
                                          <div class="progress progress-md mx-4">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </td>
                                        <td>
                                          <h5 class="font-weight-bold mb-0">924</h5>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="text-muted">California</td>
                                        <td class="w-100 px-0">
                                          <div class="progress progress-md mx-4">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </td>
                                        <td>
                                          <h5 class="font-weight-bold mb-0">664</h5>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="text-muted">Maryland</td>
                                        <td class="w-100 px-0">
                                          <div class="progress progress-md mx-4">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </td>
                                        <td>
                                          <h5 class="font-weight-bold mb-0">560</h5>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="text-muted">Alaska</td>
                                        <td class="w-100 px-0">
                                          <div class="progress progress-md mx-4">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </td>
                                        <td>
                                          <h5 class="font-weight-bold mb-0">793</h5>
                                        </td>
                                      </tr>
                                    </tbody></table>
                                  </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                  <div class="daoughnutchart-wrapper">
                                    <canvas id="north-america-chart" width="200" height="200" style="display: block; box-sizing: border-box; height: 200px; width: 200px;"></canvas>
                                  </div>
                                  <div id="north-america-chart-legend">
                                  <ul>
                  <li>
                    <span style="background-color: #4B49AC"></span>
                    Offline sales
                  </li>
                
                  <li>
                    <span style="background-color: #FFC100"></span>
                    Online sales
                  </li>
                
                  <li>
                    <span style="background-color: #248AFD"></span>
                    Returns
                  </li>
                </ul><ul>
                  <li>
                    <span style="background-color: #4B49AC"></span>
                    Offline sales
                  </li>
                
                  <li>
                    <span style="background-color: #FFC100"></span>
                    Online sales
                  </li>
                
                  <li>
                    <span style="background-color: #248AFD"></span>
                    Returns
                  </li>
                </ul></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="carousel-item active">
                          <div class="row">
                            <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                              <div class="ml-xl-4 mt-3">
                                <p class="card-title">Detailed Reports</p>
                                <h1 class="text-primary">$34040</h1>
                                <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                                <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                              </div>
                            </div>
                            <div class="col-md-12 col-xl-9">
                              <div class="row">
                                <div class="col-md-6 border-right">
                                  <div class="table-responsive mb-3 mb-md-0 mt-3">
                                    <table class="table table-borderless report-table">
                                      <tbody><tr>
                                        <td class="text-muted">Illinois</td>
                                        <td class="w-100 px-0">
                                          <div class="progress progress-md mx-4">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </td>
                                        <td>
                                          <h5 class="font-weight-bold mb-0">713</h5>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="text-muted">Washington</td>
                                        <td class="w-100 px-0">
                                          <div class="progress progress-md mx-4">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </td>
                                        <td>
                                          <h5 class="font-weight-bold mb-0">583</h5>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="text-muted">Mississippi</td>
                                        <td class="w-100 px-0">
                                          <div class="progress progress-md mx-4">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </td>
                                        <td>
                                          <h5 class="font-weight-bold mb-0">924</h5>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="text-muted">California</td>
                                        <td class="w-100 px-0">
                                          <div class="progress progress-md mx-4">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </td>
                                        <td>
                                          <h5 class="font-weight-bold mb-0">664</h5>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="text-muted">Maryland</td>
                                        <td class="w-100 px-0">
                                          <div class="progress progress-md mx-4">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </td>
                                        <td>
                                          <h5 class="font-weight-bold mb-0">560</h5>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="text-muted">Alaska</td>
                                        <td class="w-100 px-0">
                                          <div class="progress progress-md mx-4">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </td>
                                        <td>
                                          <h5 class="font-weight-bold mb-0">793</h5>
                                        </td>
                                      </tr>
                                    </tbody></table>
                                  </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                  <div class="daoughnutchart-wrapper">
                                    <canvas id="south-america-chart" height="200" style="display: block; box-sizing: border-box; height: 200px; width: 200px;" width="200"></canvas>
                                  </div>
                                  <div id="south-america-chart-legend"><ul>
                  <li>
                    <span style="background-color: #4B49AC"></span>
                    Offline sales
                  </li>
                
                  <li>
                    <span style="background-color: #FFC100"></span>
                    Online sales
                  </li>
                
                  <li>
                    <span style="background-color: #248AFD"></span>
                    Returns
                  </li>
                </ul><ul>
                  <li>
                    <span style="background-color: #4B49AC"></span>
                    Offline sales
                  </li>
                
                  <li>
                    <span style="background-color: #FFC100"></span>
                    Online sales
                  </li>
                
                  <li>
                    <span style="background-color: #248AFD"></span>
                    Returns
                  </li>
                </ul></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#detailedReports" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      </a>
                      <a class="carousel-control-next" href="#detailedReports" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title mb-0">Top Products</p>
                    <div class="table-responsive">
                      <table class="table table-striped table-borderless">
                        <thead>
                          <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Search Engine Marketing</td>
                            <td class="font-weight-bold">$362</td>
                            <td>21 Sep 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-success">Completed</div>
                            </td>
                          </tr>
                          <tr>
                            <td>Search Engine Optimization</td>
                            <td class="font-weight-bold">$116</td>
                            <td>13 Jun 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-success">Completed</div>
                            </td>
                          </tr>
                          <tr>
                            <td>Display Advertising</td>
                            <td class="font-weight-bold">$551</td>
                            <td>28 Sep 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-warning">Pending</div>
                            </td>
                          </tr>
                          <tr>
                            <td>Pay Per Click Advertising</td>
                            <td class="font-weight-bold">$523</td>
                            <td>30 Jun 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-warning">Pending</div>
                            </td>
                          </tr>
                          <tr>
                            <td>E-Mail Marketing</td>
                            <td class="font-weight-bold">$781</td>
                            <td>01 Nov 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-danger">Cancelled</div>
                            </td>
                          </tr>
                          <tr>
                            <td>Referral Marketing</td>
                            <td class="font-weight-bold">$283</td>
                            <td>20 Mar 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-warning">Pending</div>
                            </td>
                          </tr>
                          <tr>
                            <td>Social media marketing</td>
                            <td class="font-weight-bold">$897</td>
                            <td>26 Oct 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-success">Completed</div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">To Do Lists</h4>
                    <div class="list-wrapper pt-2">
                      <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                        <li>
                          <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Meeting with Urban Team <i class="input-helper"></i></label>
                          </div>
                          <i class="remove ti-close"></i>
                        </li>
                        <li class="completed">
                          <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" checked=""> Duplicate a project for new customer <i class="input-helper"></i></label>
                          </div>
                          <i class="remove ti-close"></i>
                        </li>
                        <li>
                          <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Project meeting with CEO <i class="input-helper"></i></label>
                          </div>
                          <i class="remove ti-close"></i>
                        </li>
                        <li class="completed">
                          <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" checked=""> Follow up of team zilla <i class="input-helper"></i></label>
                          </div>
                          <i class="remove ti-close"></i>
                        </li>
                        <li>
                          <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Level up for Antony <i class="input-helper"></i></label>
                          </div>
                          <i class="remove ti-close"></i>
                        </li>
                      </ul>
                    </div>
                    <div class="add-items d-flex mb-0 mt-2">
                      <input type="text" class="form-control todo-list-input" placeholder="Add new task">
                      <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="icon-circle-plus"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title mb-0">Projects</p>
                    <div class="table-responsive">
                      <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th class="ps-0  pb-2 border-bottom">Places</th>
                            <th class="border-bottom pb-2">Orders</th>
                            <th class="border-bottom pb-2">Users</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="ps-0">Kentucky</td>
                            <td>
                              <p class="mb-0"><span class="font-weight-bold me-2">65</span>(2.15%)</p>
                            </td>
                            <td class="text-muted">65</td>
                          </tr>
                          <tr>
                            <td class="ps-0">Ohio</td>
                            <td>
                              <p class="mb-0"><span class="font-weight-bold me-2">54</span>(3.25%)</p>
                            </td>
                            <td class="text-muted">51</td>
                          </tr>
                          <tr>
                            <td class="ps-0">Nevada</td>
                            <td>
                              <p class="mb-0"><span class="font-weight-bold me-2">22</span>(2.22%)</p>
                            </td>
                            <td class="text-muted">32</td>
                          </tr>
                          <tr>
                            <td class="ps-0">North Carolina</td>
                            <td>
                              <p class="mb-0"><span class="font-weight-bold me-2">46</span>(3.27%)</p>
                            </td>
                            <td class="text-muted">15</td>
                          </tr>
                          <tr>
                            <td class="ps-0">Montana</td>
                            <td>
                              <p class="mb-0"><span class="font-weight-bold me-2">17</span>(1.25%)</p>
                            </td>
                            <td class="text-muted">25</td>
                          </tr>
                          <tr>
                            <td class="ps-0">Nevada</td>
                            <td>
                              <p class="mb-0"><span class="font-weight-bold me-2">52</span>(3.11%)</p>
                            </td>
                            <td class="text-muted">71</td>
                          </tr>
                          <tr>
                            <td class="ps-0 pb-0">Louisiana</td>
                            <td class="pb-0">
                              <p class="mb-0"><span class="font-weight-bold me-2">25</span>(1.32%)</p>
                            </td>
                            <td class="pb-0">14</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="row">
                  <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <p class="card-title">Charts</p>
                        <div class="charts-data">
                          <div class="mt-3">
                            <p class="mb-0">Data 1</p>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="progress progress-md flex-grow-1 me-4">
                                <div class="progress-bar bg-inf0" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mb-0">5k</p>
                            </div>
                          </div>
                          <div class="mt-3">
                            <p class="mb-0">Data 2</p>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="progress progress-md flex-grow-1 me-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mb-0">1k</p>
                            </div>
                          </div>
                          <div class="mt-3">
                            <p class="mb-0">Data 3</p>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="progress progress-md flex-grow-1 me-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mb-0">992</p>
                            </div>
                          </div>
                          <div class="mt-3">
                            <p class="mb-0">Data 4</p>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="progress progress-md flex-grow-1 me-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mb-0">687</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>   
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">Notifications</p>
                    <ul class="icon-data-list">
                      <li>
                        <div class="d-flex">
                          <img src="assets/images/faces/face1.jpg" alt="user">
                          <div>
                            <p class="text-info mb-1">Isabella Becker</p>
                            <p class="mb-0">Sales dashboard have been created</p>
                            <small>9:30 am</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex">
                          <img src="assets/images/faces/face2.jpg" alt="user">
                          <div>
                            <p class="text-info mb-1">Adam Warren</p>
                            <p class="mb-0">You have done a great job #TW111</p>
                            <small>10:30 am</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex">
                          <img src="assets/images/faces/face3.jpg" alt="user">
                          <div>
                            <p class="text-info mb-1">Leonard Thornton</p>
                            <p class="mb-0">Sales dashboard have been created</p>
                            <small>11:30 am</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex">
                          <img src="assets/images/faces/face4.jpg" alt="user">
                          <div>
                            <p class="text-info mb-1">George Morrison</p>
                            <p class="mb-0">Sales dashboard have been created</p>
                            <small>8:50 am</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex">
                          <img src="assets/images/faces/face5.jpg" alt="user">
                          <div>
                            <p class="text-info mb-1">Ryan Cortez</p>
                            <p class="mb-0">Herbs are fun and easy to grow.</p>
                            <small>9:00 am</small>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">Advanced Table</p>
                    <div class="row">
                      <div class="col-12">
                        <div class="table-responsive">
                          <table id="example" class="display expandable-table" style="width:100%">
                            <thead>
                              <tr>
                                <th>Quote#</th>
                                <th>Product</th>
                                <th>Business type</th>
                                <th>Policy holder</th>
                                <th>Premium</th>
                                <th>Status</th>
                                <th>Updated at</th>
                                <th></th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->

        </div>

</div>




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="/resources/chart.js/chart.umd.js"></script>
 <script src="/resources/js/off-canvas.js"></script>







@endsection
