import React from 'react';
import ReactModal from 'react-modal';

ReactModal.setAppElement('#root');

const Modal = ({ isOpen, onRequestClose, title, children }) => {
  return (
    <ReactModal
      isOpen={isOpen}
      onRequestClose={onRequestClose}
      contentLabel={title}
      className="modal"
      overlayClassName="modal-overlay"
    >
      <div className="modal-header">
        <h2>{title}</h2>
        <button onClick={onRequestClose}>Close</button>
      </div>
      <div className="modal-body">{children}</div>
    </ReactModal>
  );
};

export default Modal;