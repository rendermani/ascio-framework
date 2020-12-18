import {FETCH_CUSTOMER_TREE,SELECT_CUSTOMER_TREE} from './types'

export const fetchCustomerTree = () => dispatch => {
    setTimeout(() => {
        dispatch(
        {
            type : FETCH_CUSTOMER_TREE,
            payload: [
                {
                    id: "2",
                    name: "Calendar"
                },
                {
                    id: "3",
                    name: "Settings"
                },
                {
                    id: "4",
                    name: "Music"
                }
          ]
        });
      }, 100);
  };


  export const  selectCustomerTree = users => dispatch => {
    dispatch (
        {
            type : SELECT_CUSTOMER_TREE,
            payload: users
        }
    )

  };