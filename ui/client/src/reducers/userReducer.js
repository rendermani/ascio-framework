
import { FETCH_CUSTOMER_TREE, SELECT_CUSTOMER_TREE } from '../actions/types';

const initialState = {
  selected: [],
  childNodes: []
};

export default function(state = initialState, action) {
  switch (action.type) {
    case FETCH_CUSTOMER_TREE:
      return {
        ...state,
        childNodes: action.payload
      };
    case SELECT_CUSTOMER_TREE:
      return {
        ...state,
        selected: action.payload
      };
    default:
      return state;
  }
}