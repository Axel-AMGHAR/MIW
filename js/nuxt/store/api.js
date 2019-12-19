import { asyncGetData } from '~/common/api.js'

export const state = () => []

export const mutations = {
  gotProducts(state, payload) {
    state = payload
  }
}

export const actions = {
  async fetchProducts(context) {
    const products = await asyncGetData()
    context.commit('gotProducts', products)
  }
}
