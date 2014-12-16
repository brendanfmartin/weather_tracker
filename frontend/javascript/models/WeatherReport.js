/*jslint indent: 2 */
var WT = WT || {};
WT.models = WT.models || {};

/**
 * Weather Report Model.
 */
WT.models.WeatherReport = function (parameters) {
  'use strict';

  var id = null,
    isForecast = null,
    date = null,
    location = null,
    sunrise = null,
    sunset = null,
    temperature = null,
    minTemperature = null,
    maxTemperature = null,
    humidity = null,
    pressure = null,
    seaLevelPressure = null,
    groundLevelPressure = null,
    windSpeed = null,
    windDirection = null,
    windGusts = null,
    cloudiness = null,
    rainPrecipitationVolume = null,
    snowPrecipitationVolume = null;

  this.getId = function () {
    return this.id;
  };

  this.setId = function (id) {
    this.id = id;
    return this;
  };

  this.getIsForecast = function () {
    return this.isForecast;
  };

  this.setIsForecast = function (isForecast) {
    this.isForecast = isForecast;
    return this;
  };

  this.getDate = function () {
    return this.date;
  };

  this.setDate = function (date) {
    this.date = date;
    return this;
  };

  this.getLocation = function () {
    return this.location;
  };

  this.setLocation = function (location) {
    this.location = location;
    return this;
  };

  this.getSunrise= function () {
    return this.sunrise;
  };

  this.setSunrise = function (sunrise) {
    this.sunrise = sunrise;
    return this;
  };

  this.getSunset = function () {
    return this.sunset;
  };

  this.setSunset = function (sunset) {
    this.sunset = sunset;
    return this;
  };

  this.getTemperature = function () {
    return this.temperature;
  };

  this.setTemperature = function (temperature) {
    this.temperature = temperature;
    return this;
  };

  this.getMinTemperature = function () {
    return this.minTemperature;
  };

  this.setMinTemperature = function (minTemperature) {
    this.minTemperature = minTemperature;
    return this;
  };

  this.getMaxTemperature = function () {
    return this.maxTemperature;
  };

  this.setMaxTemperature = function (maxTemperature) {
    this.maxTemperature = maxTemperature;
    return this;
  };

  this.getHumidity = function () {
    return this.humidity;
  };

  this.setHumidity = function (humidity) {
    this.humidity = humidity;
    return this;
  };

  this.getPressure = function () {
    return this.pressure;
  };

  this.setPressure = function (pressure) {
    this.pressure = pressure;
    return this;
  };

  this.getSeaLevelPressure = function () {
    return this.seaLevelPressure;
  };

  this.setSeaLevelPressure = function (seaLevelPressure) {
    this.seaLevelPressure = seaLevelPressure;
    return this;
  };

  this.getGroundLevelPressure = function () {
    return this.groundLevelPressure;
  };

  this.setGroundLevelPressure = function (groundLevelPressure) {
    this.groundLevelPressure = groundLevelPressure;
    return this;
  };

  this.getWindSpeed = function () {
    return this.windSpeed;
  };

  this.setWindSpeed = function (windSpeed) {
    this.windSpeed = windSpeed;
    return this;
  };

  this.getWindDirection = function () {
    return this.windDirection;
  };

  this.setWindDirection = function (windDirection) {
    this.windDirection = windDirection;
    return this;
  };

  this.getWindGusts = function () {
    return this.windGusts;
  };

  this.setWindGusts = function (windGusts) {
    this.windGusts = windGusts;
    return this;
  };

  this.getCloudiness = function () {
    return this.cloudiness;
  };

  this.setCloudiness = function (cloudiness) {
    this.cloudiness = cloudiness;
    return this;
  };

  this.getRainPrecipitationVolume = function () {
    return this.rainPrecipitationVolume;
  };

  this.setRainPrecipitationVolume = function (rainPrecipitationVolume) {
    this.rainPrecipitationVolume = rainPrecipitationVolume;
    return this;
  };

  this.getSnowPrecipitationVolume = function () {
    return this.snowPrecipitationVolume;
  };

  this.setSnowPrecipitationVolume = function (snowPrecipitationVolume) {
    this.snowPrecipitationVolume = snowPrecipitationVolume;
    return this;
  };
};