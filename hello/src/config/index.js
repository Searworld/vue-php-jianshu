const config = {
  'www.searworld.com': {
    baseUrl: '//www.searworld.com'
  },
  'localhost': {
    baseUrl: '//localhost/api/'
  }
}

export default config[window.location.hostname]
