// import jsonp from './jsonp.js'
import { commenParams } from './commenParams.js'
import axios from 'axios'

export function getSongList () {
  const url = '/api/getDiscList'
  const data = Object.assign({}, commenParams, {
    rnd: Math.random(),
    platform: 'yqq',
    needNewCode: 0,
    categoryId: 10000000,
    sortId: 5,
    sin: 0,
    ein: 29,
    hostUin: 0,
    format: 'jsonp'
  })
  return axios.get(url, {params: data}).then((res) => {
    return Promise.reslve(res.data)
  })
}
