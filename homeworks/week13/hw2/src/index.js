import {getComments, addComments} from './api'
import {appendCommentToDOM, appendStyle} from './utils'
import {grtLoadMoreButton, cssTemplate, getForm} from './templates'
import $ from 'jquery'

export function init(options) {
    let siteKey = ""
    let apiUrl = ""
    let containerElemsnt = null
    let commentDOM = null
    let lastId = null
    let isEnd = false
    let loadMoreClassName
    let commentsClassName
    let commentsSelector
    let formClassName
    let formselector

  siteKey = options.siteKey
  apiUrl = options.apiUrl
  loadMoreClassName = `${siteKey}-load-more`
  commentsClassName = `${siteKey}-comments`
  formClassName = `${siteKey}-add-comment-form`
  formselector = '.' + formClassName
  commentsSelector = '.' + commentsClassName

  containerElemsnt = $(options.containerSelector)
  containerElemsnt.append(getForm(formClassName, commentsClassName))

  appendStyle(cssTemplate)

  commentDOM = $(commentsSelector)
  getNewComments()
  const nickNameDOM = `${formselector} input[name=nickname]`
  const contentDOM = `${formselector} textarea[name=content]`
  $(commentsSelector).on('click', '.' + loadMoreClassName, () => {
    getNewComments()
  })
  $(formselector).submit(e => {
    e.preventDefault();
    const newCommentData = {
      'site_key': siteKey,
      'nickname': $(nickNameDOM).val(),
      'content': $(contentDOM).val()
    }

    addComments(apiUrl, siteKey, newCommentData, data => {
        if (!data.ok) {
            alert(data.message)
            return
        }
        $(nickNameDOM).val('')
        $(contentDOM).val('')
        appendCommentToDOM(commentDOM, newCommentData, true)
    })
  })

  function getNewComments() {
    const commentDOM = $(commentsSelector)
    $('.' + loadMoreClassName).hide()
    if (isEnd) {
      return
    }
    getComments(apiUrl, siteKey, lastId, data => {
      if (!data.ok) {
        alert(data.message)
        return
      }
      const comments = data.discussions;
      for (let comment of comments) {
        appendCommentToDOM(commentDOM, comment)
      }
      let length = comments.length
      if (length === 0) {
        isEnd = true
        $('.' + loadMoreClassName).hide()
      } else {
        lastId = comments[length - 1].id
        const loadMoreButtonHTML = grtLoadMoreButton(loadMoreClassName)
        $(commentsSelector).append(loadMoreButtonHTML)
      }
      
    })
  }
}


  
