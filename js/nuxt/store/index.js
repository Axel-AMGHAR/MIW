import { asyncGetData } from '~/common/api.js'

export const state = () => ({ products: []})

export const mutations = {
  gotProducts(state, payload) {
    state.products = payload
  }
}

export const actions = {
  async fetchProducts(context) {
    const products = await asyncGetData()
    context.commit('gotProducts', products)
  }
}
