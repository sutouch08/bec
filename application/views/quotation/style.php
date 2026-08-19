<style>
  .form-group {
    margin-bottom: 5px;
  }

  .input-icon>.ace-icon {
    z-index: 1;
  }

  .table>tr>td {
    padding: 3px;
  }

  .freez>th {
    top: 0;
    position: sticky;
    background-color: #f8f8f8;
    outline: solid 1px #dddddd;
    min-height: 30px;
    height: 30px;
  }

  .handle {
    cursor: move;
  }

  @media (min-width: 768px) {

    .fix-no {
      left: 0;
      position: sticky;
    }

    .fix-chk {
      left: 40px;
      position: sticky;
    }

    .fix-type {
			left: 80px;
			position: sticky !important;
		}

    .fix-img {
			left: 180px;
			position: sticky !important;
		}

    .fix-code {
			left: 240px;
			position: sticky !important;
		}

		.fix-desc {
			left: 390px;
			position: sticky !important;
		}

    td[scope=row] {
      background-color: #f8f8f8;
      border: 0 !important;
      outline: solid 1px #dddddd;
    }
  }
</style>